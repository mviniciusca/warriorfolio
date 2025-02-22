<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Category;
use App\Models\Page as PageContract;
use App\Models\Page as PageModel;
use App\Models\Post;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
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
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class PostResource extends Resource
{
    public static function getModel(): string
    {
        return FilamentFabricator::getPageModel();
    }

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    public static function getNavigationLabel(): string
    {
        return __('Blog');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Core Features');
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::where('style', '=', 'blog')->count() > 0) {
            if (static::getModel()::where('style', '=', 'blog')->count() >= 999) {
                return '+999';
            } else {
                return static::getModel()::where('style', '=', 'blog')->count();
            }
        }

        return null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(4)
            ->schema([
                Section::make(__('Blog Post'))
                    ->description(__('Write, edit and manage your Blog Post.'))
                    ->columnSpan(3)
                    ->icon('heroicon-o-pencil')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Post Title'))
                            ->live(onBlur: true)
                            ->helperText(__('Title of your post.'))
                            ->prefixIcon('heroicon-o-pencil')
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug',
                                env('APP_BLOG_PATH').Str::slug($state).env('APP_BLOG_URL_END')))
                            ->required()
                            ->maxLength(255),
                        Hidden::make('style')
                            ->default('blog'),
                        Hidden::make('blocks')
                            ->dehydrated()
                            ->default([['data' => [], 'type' => 'blog.post']])
                            ->required(),
                        Group::make()
                            ->relationship('post')
                            ->schema([
                                Textarea::make('resume')
                                    ->helperText(__('Optional'))
                                    ->label(__('Short Description')),
                                RichEditor::make('content')
                                    ->required()
                                    ->helperText(__('Content of your post.'))
                                    ->columnSpanFull(),
                            ]),
                        TextInput::make('slug')
                            ->prefixIcon('heroicon-o-link')
                            ->dehydrated()
                            ->label(__('Post Slug'))
                            ->required()
                            ->helperText(__('Automatic generated.'))
                            ->maxLength(255),
                    ]),
                Group::make()
                    ->columnSpan(1)
                    ->relationship('post')
                    ->schema([
                        Section::make(__('Featured Image'))
                            ->icon('heroicon-o-photo')
                            ->schema([
                                CuratorPicker::make('img_cover')
                                    ->helperText(__('Image cover. Optional.'))
                                    ->label(__('Cover')),
                            ]),
                        Section::make(__('Settings'))
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Select::make('category_id')
                                    ->label(__('Category'))
                                    ->helperText(__('Main category of your post.'))
                                    ->required()
                                    ->options(Category::
                                    where('is_blog', '=', true)
                                        ->pluck('name', 'id')),
                                Toggle::make('is_active')
                                    ->label(__('Status'))
                                    ->required()
                                    ->label(__('Published'))
                                    ->helperText(__('Visibility status of your post.'))
                                    ->default(true),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                PageContract::query()
                    ->where('style', '=', 'blog')
                    ->orderByDesc('created_at')
            )
            ->columns([
                TextColumn::make('title')
                    ->limit(40)
                    ->searchable(),
                TextColumn::make('post.category.name')
                    ->badge()
                    ->limit(30)
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->alignCenter()
                    ->label(__('Published')),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('visit')
                        ->label(__('filament-fabricator::page-resource.actions.visit'))
                        ->url(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id, true) ?: null)
                        ->icon('heroicon-o-arrow-top-right-on-square')
                        ->openUrlInNewTab()
                        ->color('success')
                        ->visible(config('filament-fabricator.routing.enabled')),
                    Tables\Actions\EditAction::make()
                        ->label(__('Edit')),
                    DeleteAction::make()
                        ->label('Delete'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
