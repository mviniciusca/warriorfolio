<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationLabel = 'Projects';
    protected static ?string $navigationGroup = 'App Sections';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    FileUpload::make('image_cover')
                        ->image()
                        ->imageEditor()
                        ->directory('projects')
                        ->required()
                        ->placeholder('Upload Cover Image')
                        ->label(''),
                    Section::make('Category')
                        ->icon('heroicon-o-tag')
                        ->schema([
                            Select::make('category_id')
                                ->relationship('category', 'name')
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
                Group::make()->schema([
                    Section::make('Project Information')
                        ->icon('heroicon-o-information-circle')
                        ->schema([
                            TextInput::make('name')
                                ->autofocus()
                                ->reactive()
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->required()
                                ->label('Title'),
                            TextInput::make('slug')
                                ->disabled()
                                ->dehydrated()
                                ->placeholder('generated automatically')
                                ->label('Slug'),
                            RichEditor::make('content')
                                ->fileAttachmentsDirectory('project/attachments')
                                ->columnSpanFull()
                                ->required(),
                            TextInput::make('external_link')
                                ->label('External Link')
                                ->placeholder('https://example.com')
                                ->helperText('If you want to add an external link to the project, you can do it here')
                                ->columnSpanFull(),
                        ])->columns(2)
                ])->columnSpan(3),
            ])->columns(4);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_cover')
                    ->label('')
                    ->size(80),
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
