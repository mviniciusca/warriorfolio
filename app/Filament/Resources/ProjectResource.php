<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Category;
use App\Models\Project;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
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
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

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

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->name;
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::where('is_active', true)->count() > 0) {
            return static::getModel()::where('is_active', true)->count();
        }

        return null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->columnSpan(3)
                    ->schema([
                        Section::make(__('Project Information'))
                            ->icon('heroicon-o-information-circle')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label(__(__('Project Title')))
                                    ->live(true)
                                    ->required()
                                    ->autofocus()
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->unique('projects', 'name', ignoreRecord: true)
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
                Group::make()->schema([
                    CuratorPicker::make('image_cover')
                        ->buttonLabel(__('Upload Cover Image'))
                        ->directory('public/project')
                        ->maxSize(4000)
                        ->required()
                        ->maxItems(1)
                        ->multiple(false)
                        ->label(__('Cover Image')),
                    Section::make('Category')
                        ->icon('heroicon-o-tag')
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
                                    Section::make('Fast Create Category.')
                                        ->icon('heroicon-o-tag')
                                        ->description('Create a new category for the project. Edit other settings of this category later.')
                                        ->schema([
                                            TextInput::make('name')
                                                ->lazy()
                                                ->unique()
                                                ->maxLength(200)
                                                ->helperText('The name of the category. Max: 200 characters.')
                                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                                ->required()
                                                ->label(__('Category Name')),
                                            TextInput::make('slug')
                                                ->disabled()
                                                ->unique()
                                                ->maxLength(200)
                                                ->dehydrated()
                                                ->placeholder(__('generated automatically'))
                                                ->label('Slug'),
                                        ])->columns(2),
                                ])
                                ->optionsLimit(10)
                                ->searchable()
                                ->required(),
                        ]),
                    Section::make('Visibility')
                        ->icon('heroicon-o-eye')
                        ->schema([
                            Toggle::make('is_active')
                                ->label('Published')
                                ->helperText(__('Project visibility.'))
                                ->default(true)
                                ->required()
                                ->inline(),
                        ]),
                ]),
            ])
            ->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image_cover')
                    ->size(80)
                    ->label('Cover'),
                Tables\Columns\TextColumn::make('name')
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
