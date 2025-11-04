<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\Pages\EditProject;
use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
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
                    ->label(__('Project Title'))
                    ->live(true)
                    ->required()
                    ->afterStateUpdated(function (Set $set, Get $get, ?string $state) {
                        // Update the slug
                        $set('slug', 'project/'.Str::slug($state).'.html');

                        // Update the SEO title at the same time
                        $settings = Setting::first();
                        $appName = $settings?->application['name'] ?? '';
                        $metaTitle = $settings?->meta['meta_title'] ?? '';

                        // Build SEO title with validations
                        $seoTitle = $state ?? '';
                        if (! empty($appName)) {
                            $seoTitle .= " - {$appName}";
                        }
                        if (! empty($metaTitle)) {
                            $seoTitle .= " - {$metaTitle}";
                        }

                        // Set SEO title in project relationship
                        $set('project.seo_title', 'Project: '.$seoTitle);
                    })
                    ->unique('pages', 'title', ignoreRecord: true)
                    ->maxLength(200)
                    ->prefixIcon('heroicon-o-rocket-launch'),
                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->prefixIcon('heroicon-o-link')
                    ->label(__('Slug')),
                Group::make()
                    ->columnSpanFull()
                    ->relationship('project')
                    ->schema([
                        \Filament\Forms\Components\Wizard::make([
                            \Filament\Forms\Components\Wizard\Step::make('Cover Image')
                                ->icon('heroicon-o-photo')
                                ->schema([
                                    FileUpload::make('image_cover')
                                        ->directory('public/projects')
                                        ->imagePreviewHeight('600')
                                        ->maxFiles(1)
                                        ->imageEditor()
                                        ->imageEditorAspectRatios([
                                            '16:9' => '16:9',
                                            '4:3'  => '4:3',
                                            '1:1'  => '1:1',
                                        ])
                                        ->label(__('Cover Image')),
                                ]),

                            \Filament\Forms\Components\Wizard\Step::make('Project Details')
                                ->icon('heroicon-o-document-text')
                                ->schema([
                                    RichEditor::make('content')
                                        ->fileAttachmentsDirectory('project/attachments')
                                        ->maxLength(5000)
                                        ->label(__('Content (Optional)')),
                                    Textarea::make('short_description')
                                        ->rows(2)
                                        ->maxLength(500)
                                        ->label(__('Short Description (Optional)')),
                                ]),

                            \Filament\Forms\Components\Wizard\Step::make('Categorization')
                                ->icon('heroicon-o-tag')
                                ->schema([
                                    Section::make(__('Project Classification'))
                                        ->description(__('Organize your project for better discoverability'))
                                        ->icon('heroicon-o-tag')
                                        ->columns(2)
                                        ->schema([
                                            Select::make('category_id')
                                                ->relationship('category', 'name')
                                                ->options(Category::where('is_project', '=', true)->pluck('name', 'id'))
                                                ->createOptionUsing(fn (array $data) => Category::create($data + [
                                                    'is_blog'    => false,
                                                    'is_project' => true,
                                                ])->getKey())
                                                ->label(__('Category')),
                                            TagsInput::make('tags')
                                                ->placeholder(__('Add tags to the project'))
                                                ->label(__('Tags (Optional)'))
                                                ->live(true)
                                                ->afterStateUpdated(function (Set $set, ?array $state) {
                                                    // Update SEO keywords based on tags
                                                    if (! empty($state)) {
                                                        $set('seo_keywords', implode(', ', $state));
                                                    }
                                                }),
                                        ]),

                                    Section::make(__('External Resources'))
                                        ->description(__('Add links to the live project or related content'))
                                        ->icon('heroicon-o-globe-alt')
                                        ->schema([
                                            TextInput::make('external_link')
                                                ->label(__('External Link (Optional)'))
                                                ->placeholder('https://example.com')
                                                ->url()
                                                ->maxLength(255)
                                                ->prefixIcon('heroicon-o-link'),
                                        ]),
                                ]),

                            \Filament\Forms\Components\Wizard\Step::make('Publication')
                                ->icon('heroicon-o-check-circle')
                                ->schema([
                                    Toggle::make('is_active')
                                        ->label('Published')
                                        ->helperText(__('Publish the project to make it visible on your portfolio section.'))
                                        ->default(true)
                                        ->onIcon('heroicon-o-check-circle')
                                        ->offIcon('heroicon-o-eye-slash'),
                                    Card::make()
                                        ->schema([
                                            Placeholder::make('publication_info')
                                                ->content(__('After setting the project as published, it will be visible on your portfolio section. Make sure all required fields are filled properly.')),
                                        ]),
                                ]),
                        ])
                            ->columnSpanFull()
                            ->skippable(),
                    ]),
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
                    ->icon('heroicon-o-rocket-launch')
                    ->color('primary')
                    ->size('sm')
                    ->url(Pages\CreateProject::getUrl()),
            ])
            ->query(Page::query()
                ->where('style', '=', 'project'))
            ->columns([
                View::make('filament.widgets.projects.card'),
            ])
            ->defaultPaginationPageOption(50)
            ->contentGrid([
                'sm' => 2,
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
            ])
            ->recordUrl(fn (Page $record): string => route('filament.admin.resources.projects.edit', ['record' => $record]))
            ->defaultSort('created_at', 'desc')
            ->persistFiltersInSession()
            ->filters([
                TernaryFilter::make('is_active')
                    ->relationship('project', 'is_active')
                    ->label(__('Status'))
                    ->trueLabel(__('Published'))
                    ->falseLabel(__('Not Published'))
                    ->placeholder(__('All'))
                    ->default(true)
                    ->indicateUsing(function (array $state): array {
                        if (! $state['value'] ?? null) {
                            return [];
                        }

                        return ['Status' => $state['value'] ? 'Published' : 'Not Published'];
                    }),
            ], layout:FiltersLayout::Modal)
            ->actions([
                ActionGroup::make([
                    Action::make('publish')
                        ->label(__('Set as Published'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (Page $record) {
                            $record->project->update(['is_active' => true]);
                        })
                        ->visible(fn (Page $record) => ! $record->project->is_active),
                    Action::make('unpublish')
                        ->label(__('Set as Not Published'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function (Page $record) {
                            $record->project->update(['is_active' => false]);
                        })
                        ->visible(fn (Page $record) => $record->project->is_active),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('publish')
                        ->label(__('Set Selected as Published'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->project->update(['is_active' => true]);
                            });
                        }),
                    Tables\Actions\BulkAction::make('unpublish')
                        ->label(__('Set Selected as Not Published'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->project->update(['is_active' => false]);
                            });
                        }),
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
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => EditProject::route('/{record}/edit'),
        ];
    }
}
