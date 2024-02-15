<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Resources\ProjectResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    public static function getNavigationGroup(): ?string
    {
        return __('App Sections');
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
                Group::make()->schema([
                    Section::make('Project Information')
                        ->icon('heroicon-o-information-circle')
                        ->schema([
                            TextInput::make('name')
                                ->autofocus()
                                ->lazy()
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(200)
                                ->helperText('The name of the project. Max: 200 characters.')
                                ->label('Title'),
                            TextInput::make('slug')
                                ->disabled()
                                ->dehydrated()
                                ->placeholder('generated automatically')
                                ->helperText('This is automatically generated from the title.')
                                ->label('Slug'),
                            Textarea::make('short_description')
                                ->columnSpanFull()
                                ->maxLength(500)
                                ->helperText('A short description of the project. Max: 500 characters.')
                                ->label('Short Description (Optional)'),
                            RichEditor::make('content')
                                ->fileAttachmentsDirectory('project/attachments')
                                ->columnSpanFull()
                                ->maxLength(5000)
                                ->helperText('The content of the project. Max: 5000 characters.')
                                ->label('Content (Optional)'),
                            TextInput::make('external_link')
                                ->label('External Link (Optional)')
                                ->placeholder('https://example.com')
                                ->url()
                                ->maxLength(255)
                                ->helperText('The external link of the project. Max: 255 characters.')
                                ->columnSpanFull(),
                        ])->columns(2)
                ])->columnSpan(3),
                Group::make()->schema([
                    CuratorPicker::make('image_cover')
                        ->buttonLabel('Upload Cover Image')
                        ->directory('public/project')
                        ->maxSize(4000)
                        ->required()
                        ->label('Cover Image'),
                    Section::make('Category')
                        ->icon('heroicon-o-tag')
                        ->schema([
                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->options(Category::all()->pluck('name', 'id'))
                                ->createOptionForm([
                                    Section::make('Fast Create Category')
                                        ->icon('heroicon-o-tag')
                                        ->description('Create a new category for the project. Edit other settings of this category later.')
                                        ->schema([
                                            TextInput::make('name')
                                                ->lazy()
                                                ->unique()
                                                ->maxLength(200)
                                                ->helperText('The name of the category. Max: 200 characters.')
                                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                                ->required()
                                                ->label('Category Name'),
                                            TextInput::make('slug')
                                                ->disabled()
                                                ->unique()
                                                ->maxLength(200)
                                                ->dehydrated()
                                                ->placeholder('generated automatically')
                                                ->label('Slug'),
                                        ])->columns(2)
                                ])
                                ->optionsLimit(10)
                                ->searchable()
                                ->required()
                        ]),
                    Section::make('Project Visibility')
                        ->icon('heroicon-o-eye')
                        ->schema([
                            Toggle::make('is_active')
                                ->label('Published')
                                ->required()
                                ->inline(false)
                                ->default(true)
                        ]),
                ]),
            ])->columns(4);
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
