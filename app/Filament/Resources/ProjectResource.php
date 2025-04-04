<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Category;
use App\Models\Page;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
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
            ->columns(5)
            ->schema([
                Group::make()
                    ->columnSpan(4)
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
                        Group::make()
                            ->relationship('project')
                            ->schema([
                                Textarea::make('short_description')
                                    ->columnSpanFull()
                                    ->rows(2)
                                    ->maxLength(500)
                                    ->helperText(__('A short description of the project. Max: 500 characters.'))
                                    ->label(__('Short Description (Optional)')),
                                RichEditor::make('content')
                                    ->fileAttachmentsDirectory('project/attachments')
                                    ->columnSpanFull()
                                    ->maxLength(5000)
                                    ->helperText(__('The content of the project. Max: 5000 characters.'))
                                    ->label(__('Content (Optional)')),
                                TextInput::make('external_link')
                                    ->label(__('External Link (Optional)'))
                                    ->placeholder('https://example.com')
                                    ->url()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-link')
                                    ->helperText(__('The external link of the project. Max: 255 characters.'))
                                    ->columnSpanFull(),
                            ]),
                    ]),
                Group::make()
                    ->columnSpan(1)
                    ->relationship('project')
                    ->schema([
                        FileUpload::make('image_cover')
                            ->directory('public/projects')
                            ->required()
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
                        Select::make('category_id')
                            ->searchable()
                            ->options(
                                Category::where('is_project', '=', true)
                                    ->pluck('name', 'id'),
                            ),
                        Toggle::make('is_active')
                            ->label('Published')
                            ->helperText(__('Project visibility.'))
                            ->default(true)
                            ->required()
                            ->inline(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Page::query()
                ->where('style', 'project'))
            ->columns([
                CuratorColumn::make('image_cover')
                    ->size(80)
                    ->label('Cover'),
                Tables\Columns\TextColumn::make('project.page.title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Published')
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->alignRight()
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
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
            'edit'   => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}

//  ->schema([
//                 Group::make()
//                     ->columnSpan(3)
//                     ->schema([
//                         Section::make(__('Project Information'))
//                             ->icon('heroicon-o-information-circle')
//                             ->columns(2)
//                             ->schema([
//                                 Hidden::make('user_id')
//                                     ->dehydrated()
//                                     ->default(Auth::user()?->id),
//                                 Hidden::make('style')
//                                     ->default('project'),
//                                 Hidden::make('blocks')
//                                     ->dehydrated()
//                                     ->default([['data' => [], 'type' => 'portfolio.project']])
//                                     ->required(),
//                                 TextInput::make('title')
//                                     ->label(__(__('Project Title')))
//                                     ->live(true)
//                                     ->required()
//                                     ->autofocus()
//                                     ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug',
//                                         'project/'.Str::slug($state).'.html'))

//                                     ->unique('pages', 'title', ignoreRecord: true)
//                                     ->maxLength(200)
//                                     ->prefixIcon('heroicon-o-rocket-launch')
//                                     ->helperText(__('The name of the project. Max: 200 characters.')),
//                                 TextInput::make('slug')
//                                     ->disabled()
//                                     ->dehydrated()
//                                     ->placeholder('generated automatically')
//                                     ->helperText(__('This is automatically generated from the title.'))
//                                     ->prefixIcon('heroicon-o-link')
//                                     ->label(__('Slug')),
//                             ]),
//                     ]),

//                 Group::make()
//                     ->relationship('project')
//                     ->schema([
//                         Textarea::make('short_description')
//                             ->columnSpanFull()
//                             ->rows(2)
//                             ->maxLength(500)
//                             ->helperText(__('A short description of the project. Max: 500 characters.'))
//                             ->label(__('Short Description (Optional)')),
//                         RichEditor::make('content')
//                             ->fileAttachmentsDirectory('project/attachments')
//                             ->columnSpanFull()
//                             ->maxLength(5000)
//                             ->helperText(__('The content of the project. Max: 5000 characters.'))
//                             ->label(__('Content (Optional)')),
//                         TextInput::make('external_link')
//                             ->label(__('External Link (Optional)'))
//                             ->placeholder('https://example.com')
//                             ->url()
//                             ->maxLength(255)
//                             ->prefixIcon('heroicon-o-link')
//                             ->helperText(__('The external link of the project. Max: 255 characters.'))
//                             ->columnSpanFull(),
//                         FileUpload::make('image_cover')
//                             ->directory('public/project')
//                             ->required()
//                             ->maxFiles(1)
//                             ->imageEditor()
//                             ->imageEditorAspectRatios(
//                                 [
//                                     '16:9' => '16:9',
//                                     '4:3'  => '4:3',
//                                     '1:1'  => '1:1',
//                                 ]
//                             )
//                             ->label(__('Cover Image')),
//                         Section::make('Category')
//                             ->icon('heroicon-o-tag')
//                             ->schema([
//                                 Select::make('category_id')
//                                     ->relationship('category', 'name')
//                                     ->options(Category::
//                                     where('is_project', '=', true)
//                                         ->pluck('name', 'id'))
//                                     ->helperText(__('Project Category'))
//                                     ->createOptionUsing(fn (array $data) => Category::create($data + [
//                                         'is_blog'    => false,
//                                         'is_project' => true,
//                                     ])->getKey())
//                                     ->createOptionForm([
//                                         Section::make('Fast Create Category.')
//                                             ->icon('heroicon-o-tag')
//                                             ->description('Create a new category for the project. Edit other settings of this category later.')
//                                             ->schema([
//                                                 TextInput::make('name')
//                                                     ->lazy()
//                                                     ->unique()
//                                                     ->maxLength(200)
//                                                     ->helperText('The name of the category. Max: 200 characters.')
//                                                     ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
//                                                     ->required()
//                                                     ->label(__('Category Name')),
//                                                 TextInput::make('slug')
//                                                     ->disabled()
//                                                     ->unique()
//                                                     ->maxLength(200)
//                                                     ->dehydrated()
//                                                     ->placeholder(__('generated automatically'))
//                                                     ->label('Slug'),
//                                             ])->columns(2),
//                                     ])
//                                     ->optionsLimit(10)
//                                     ->searchable()
//                                     ->required(),
//                             ]),
//                         Section::make('Visibility')
//                             ->icon('heroicon-o-eye')
//                             ->schema([
//                                 Toggle::make('is_active')
//                                     ->label('Published')
//                                     ->helperText(__('Project visibility.'))
//                                     ->default(true)
//                                     ->required()
//                                     ->inline(),
//                             ]),
//                     ]),
//             ])
//             ->columns(4);
