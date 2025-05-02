<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\Pages\EditProject;
use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    // v2.1.4 - Apr 25
    // Now belongs to the Page Model with Relationship to Project
    // So we can use the same page for both project and blog
    // And use Fabricator Routing System
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    public static function getNavigationGroup(): ?string
    {
        return __('Core Features');
    }

    protected static ?int $navigationSort = -1;

    public static function getNavigationLabel(): string
    {
        return __('Projects');
    }

    protected static ?string $recordTitleAttribute = 'title';

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->name;
    }

    public static function getNavigationBadge(): ?string
    {
        $activeCount = static::getModel()::where('style', '=', 'project') // v2.1.4
            ->count();

        return $activeCount > 0 ? (string) $activeCount : null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('project_tabs')
                    ->tabs([
                        Tab::make('Project Information')
                            ->icon('heroicon-o-rocket-launch')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Hidden::make('user_id')
                                            ->dehydrated()
                                            ->default(Auth::user()?->id),
                                        Hidden::make('style')
                                            ->default('project'),
                                        Hidden::make('blocks')
                                            ->dehydrated()
                                            ->default([['data' => [], 'type' => 'portfolio.project']])
                                            ->required(),
                                        TextInput::make('title')
                                            ->label(__(__('Project Title')))
                                            ->live(true)
                                            ->required()
                                            ->autofocus()
                                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug',
                                                'project/'.Str::slug($state).'.html'))
                                            ->unique('pages', 'title', ignoreRecord: true)
                                            ->maxLength(200)
                                            ->prefixIcon('heroicon-o-rocket-launch')
                                            ->helperText(__('The name of the project. Max: 200 characters.')),
                                        TextInput::make('slug')
                                            ->disabled()
                                            ->dehydrated()
                                            ->placeholder('generated automatically')
                                            ->helperText(__('This is automatically generated from the title.'))
                                            ->prefixIcon('heroicon-o-link')
                                            ->label(__('Slug')),
                                    ]),
                            ]),

                        Tab::make('Project Details')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Group::make()
                                    ->relationship('project')
                                    ->schema([
                                        Section::make('Content')
                                            ->schema([
                                                Textarea::make('short_description')
                                                    ->rows(2)
                                                    ->maxLength(500)
                                                    ->helperText(__('A short description of the project. Max: 500 characters.'))
                                                    ->label(__('Short Description (Optional)')),
                                                RichEditor::make('content')
                                                    ->fileAttachmentsDirectory('project/attachments')
                                                    ->maxLength(5000)
                                                    ->helperText(__('The content of the project. Max: 5000 characters.'))
                                                    ->label(__('Content (Optional)')),
                                                TextInput::make('external_link')
                                                    ->label(__('External Link (Optional)'))
                                                    ->placeholder('https://example.com')
                                                    ->url()
                                                    ->maxLength(255)
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->helperText(__('The external link of the project. Max: 255 characters.')),
                                            ]),
                                    ]),
                            ]),

                        Tab::make('Media & Categorization')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->relationship('project')
                                    ->schema([
                                        Section::make('Cover Image')
                                            ->schema([
                                                FileUpload::make('image_cover')
                                                    ->directory('public/projects')
                                                    ->required()
                                                    ->imagePreviewHeight('300')
                                                    ->maxFiles(1)
                                                    ->imageEditor()
                                                    ->imageEditorAspectRatios(
                                                        [
                                                            '16:9' => '16:9',
                                                            '4:3'  => '4:3',
                                                            '1:1'  => '1:1',
                                                        ]
                                                    )
                                                    ->label(__('Cover Image')),
                                            ]),

                                        Section::make('Categories & Tags')
                                            ->schema([
                                                Select::make('category_id')
                                                    ->relationship('category', 'name')
                                                    ->options(Category::
                                                    where('is_project', '=', true)
                                                        ->pluck('name', 'id'))
                                                    ->helperText(__('Project Category'))
                                                    ->createOptionUsing(fn (array $data) => Category::create($data + [
                                                        'is_blog'    => false,
                                                        'is_project' => true,
                                                    ])->getKey())
                                                    ->createOptionForm([
                                                        Section::make(__('Create Category'))
                                                            ->icon('heroicon-o-tag')
                                                            ->description(__('Create a new category for the project.'))
                                                            ->columns(2)
                                                            ->schema([
                                                                TextInput::make('name')
                                                                    ->lazy()
                                                                    ->unique()
                                                                    ->maxLength(200)
                                                                    ->required()
                                                                    ->placeholder(__('The name of the category. Max: 200 characters.'))
                                                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                                                    ->required()
                                                                    ->label(__('Category Name')),
                                                                TextInput::make('slug')
                                                                    ->disabled()
                                                                    ->unique('categories', 'slug', ignoreRecord: true)
                                                                    ->maxLength(200)
                                                                    ->dehydrated()
                                                                    ->placeholder(__('generated automatically'))
                                                                    ->label('Slug'),
                                                                TextInput::make('icon')
                                                                    ->live(true)
                                                                    ->maxLength(50)
                                                                    ->placeholder('ionicon e.g. heart-outline')
                                                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('icon', Str::slug($state)))
                                                                    ->label(__('Icon (Optional)')),
                                                                ColorPicker::make('hex_color')
                                                                    ->placeholder(__('The color of the category.'))
                                                                    ->label(__('Color (Optional)')),
                                                            ]),
                                                    ])->createOptionModalHeading(__(''))
                                                    ->optionsLimit(12)
                                                    ->searchable()
                                                    ->required(),

                                                TagsInput::make('tags')
                                                    ->placeholder(__('Add tags to the project.'))
                                                    ->helperText(__('Tags are used to categorize the project.'))
                                                    ->label(__('Tags (Optional)')),
                                            ]),

                                        Section::make('Publication Status')
                                            ->schema([
                                                Toggle::make('is_active')
                                                    ->label('Published')
                                                    ->helperText(__('Publish the project to the public. Or keep it as a draft.'))
                                                    ->default(true)
                                                    ->required()
                                                    ->onIcon('heroicon-o-check-circle')
                                                    ->offIcon('heroicon-o-eye-slash'),
                                                Card::make()
                                                    ->schema([
                                                        Placeholder::make('publication_info')
                                                            ->content(__('After setting the project as published, it will be visible on your portfolio section. Make sure all required fields are filled properly.')),
                                                    ]),
                                            ]),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Projects'))
            ->emptyStateIcon('heroicon-o-rocket-launch')
            ->emptyStateDescription(__('You don\'t have any projects yet.'))
            ->heading(__('Projects'))
            ->description(__('Manage your projects.'))
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label(__('Create Project'))
                    ->icon('heroicon-o-rrunocket-launch')
                    ->color('primary')
                    ->size('sm')
                    ->url(Pages\CreateProject::getUrl()),
            ])
            ->query(Page::query()
                ->where('style', '=', 'project'))
            ->columns([
                ImageColumn::make('project.image_cover')
                    ->label('')
                    ->size(100),
                Tables\Columns\TextColumn::make('project.page.title')
                    ->searchable()
                    ->label(__('Project Title'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('project.category.name')
                    ->badge()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('project.is_active')
                    ->label(__('Published'))
                    ->alignCenter(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->relationship('project', 'is_active')
                    ->label(__('Published'))
                    ->trueLabel(__('Published'))
                    ->falseLabel(__('Draft'))
                    ->placeholder(__('All')),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => EditProject::route('/{record}/edit'),
        ];
    }
}
