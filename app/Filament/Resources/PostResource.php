<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Category;
use App\Models\Page;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\FileUpload;
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
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class PostResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    public static function getNavigationLabel(): string
    {
        return __('Notes');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Core Features');
    }

    public static function getNavigationBadge(): ?string
    {
        $blogCount = static::getModel()::where('style', '=', 'blog')->count();

        if ($blogCount > 0) {
            return $blogCount >= 999 ? '+999' : $blogCount;
        }

        return null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(4)
            ->schema([
                Section::make(__('Notes Post'))
                    ->description(__('Write, edit and manage your Notes Post.'))
                    ->columnSpan(3)
                    ->icon('heroicon-o-pencil')
                    ->schema([
                        Hidden::make('user_id')
                            ->dehydrated()
                            ->default(Auth::user()?->id),
                        Hidden::make('post_id')
                            ->dehydrated(),
                        TextInput::make('title')
                            ->label(__('Post Title'))
                            ->live(onBlur: true)
                            ->helperText(__('Title of your post.'))
                            ->prefixIcon('heroicon-o-pencil')
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug',
                                config('warriorfolio.app_blog_path').Str::slug($state).config('warriorfolio.app_blog_url_end')))
                            ->required()
                            ->maxLength(255),
                        Hidden::make('style')
                            ->default('blog'),
                        Hidden::make('blocks')
                            ->dehydrated()
                            ->default([['data' => [], 'type' => 'blog.post']])
                            ->required(),
                        Hidden::make('is_active')
                            ->dehydrated()
                            ->default(true),
                        Group::make()
                            ->relationship('post')
                            ->schema([
                                Textarea::make('resume')
                                    ->helperText(__('Optional'))
                                    ->label(__('Short Description'))
                                    ->rows(3),
                                RichEditor::make('content')
                                    ->required()
                                    ->helperText(__('Content of your post.'))
                                    ->columnSpanFull(),
                            ]),
                        TextInput::make('slug')
                            ->prefixIcon('heroicon-o-link')
                            ->dehydrated()
                            ->unique('pages', 'slug', fn ($record) => $record)
                            ->label(__('Post Slug'))
                            ->required()
                            ->helperText(__('Unique. Automatic generated.'))
                            ->maxLength(255),
                    ]),
                Group::make()
                    ->columnSpan(1)
                    ->relationship('post')
                    ->schema([
                        Section::make(__('Featured Image'))
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('img_cover')
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
                                    ->options(Category::where('is_blog', true)->pluck('name', 'id'))
                                    ->createOptionForm([
                                        Section::make('Fast Create Category.')
                                            ->columns(2)
                                            ->icon('heroicon-o-tag')
                                            ->description('Create a new category for Notes. Edit other settings of this category later.')
                                            ->schema([
                                                TextInput::make('name')
                                                    ->lazy()
                                                    ->unique(Category::class, 'name')
                                                    ->maxLength(200)
                                                    ->helperText('The name of the category. Max: 200 characters.')
                                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                                    ->required()
                                                    ->label(__('Category Name')),
                                                TextInput::make('slug')
                                                    ->disabled()
                                                    ->unique(Category::class, 'slug')
                                                    ->maxLength(200)
                                                    ->dehydrated()
                                                    ->placeholder(__('Generated automatically'))
                                                    ->label(__('Slug')),
                                            ]),
                                    ])
                                    ->createOptionUsing(function (array $data): int {
                                        $category = Category::create([
                                            'name'       => $data['name'],
                                            'slug'       => $data['slug'],
                                            'is_blog'    => true,
                                            'is_project' => false,
                                            'is_active'  => true,
                                        ]);

                                        return $category->getKey();
                                    }),
                                Toggle::make('is_active')
                                    ->label(__('Published'))
                                    ->helperText(__('Visibility status of your post.'))
                                    ->default(true)
                                    ->live()
                                    ->afterStateUpdated(fn (Set $set, ?bool $state) => $set('../../is_active', $state)),
                                Toggle::make('is_featured')
                                    ->label(__('Featured'))
                                    ->helperText(__('Mark this post as featured.'))
                                    ->default(false),
                            ]),
                    ]),
                Section::make(__('Password Protection'))
                    ->columnSpan(3)

                    ->icon('heroicon-o-key')
                    ->columns(1)
                    ->schema([
                        Toggle::make('is_password_protected')
                            ->label(__('Password Protected'))
                            ->helperText(__('Require a password to view this post'))
                            ->reactive(),
                        TextInput::make('access_password')
                            ->label(__('Access Password'))
                            ->revealable()
                            ->password()
                            ->helperText(function ($record) {
                                if ($record && ! empty($record->access_password)) {
                                    return __('Password is set. Enter a new password to change it, or leave empty to keep current password.');
                                }

                                return __('Password required to access this post.');
                            })
                            ->placeholder(function ($record) {
                                if ($record && ! empty($record->access_password)) {
                                    return '••••••••••••••••';
                                }

                                return __('Enter password');
                            })
                            ->visible(fn ($get) => $get('is_password_protected'))
                            ->dehydrateStateUsing(function ($state, $record) {
                                if (empty($state) && $record) {
                                    return $record->access_password;
                                }

                                return filled($state) ? bcrypt($state) : null;
                            })
                            ->afterStateHydrated(function ($component, $state, $record) {
                                $component->state('');
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Notes'))
            ->emptyStateIcon('heroicon-o-pencil')
            ->query(
                Page::query()
                    ->where('style', 'blog')
            )
            ->recordClasses(fn (Page $record) => match ($record?->is_active) {
                0       => 'opacity-50 dark:opacity-30',
                default => null,
            })
            ->columns([
                TextColumn::make('title')
                    ->limit(40)
                    ->searchable(),
                TextColumn::make('post.category.name')
                    ->badge()
                    ->getStateUsing(fn (Page $record) => $record->post?->category?->name ?? '-')
                    ->sortable()
                    ->searchable(),
                ToggleColumn::make('post.is_active')
                    ->alignCenter()
                    ->label(__('Published')),
                ToggleColumn::make('post.is_featured')
                    ->alignCenter()
                    ->label(__('Featured')),
                ToggleColumn::make('is_password_protected')
                    ->label(__('Password Protected'))
                    ->alignCenter()
                    ->sortable(),
                TextColumn::make('access_password')
                    ->label(__('Has Password'))
                    ->badge()
                    ->alignCenter()
                    ->formatStateUsing(fn ($state) => $state ? __('Yes') : __('No'))
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->icon(fn ($state) => $state ? 'heroicon-o-key' : 'heroicon-o-minus'),
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
                        ->url(fn (?Page $record) => FilamentFabricator::getPageUrlFromId($record->id, true) ?: null)
                        ->icon('heroicon-o-arrow-top-right-on-square')
                        ->openUrlInNewTab()
                        ->color('success')
                        ->visible(config('filament-fabricator.routing.enabled')),
                    DeleteAction::make()
                        ->label('Delete'),
                    Tables\Actions\ForceDeleteAction::make(),

                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ForceDeleteBulkAction::make(),
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
