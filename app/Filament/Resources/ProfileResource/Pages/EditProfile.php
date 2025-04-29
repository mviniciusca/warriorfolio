<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\IconPosition;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationLabel(): string
    {
        return __('Your Profile');
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(12)
            ->schema([
                Tabs::make('Profile')
                    ->columnSpanFull()
                    ->persistTabInQueryString()
                    ->tabs([
                        Tabs\Tab::make(__('Basic Info'))
                            ->icon('heroicon-o-user')
                            ->schema([
                                Section::make(__('Profile Overview'))
                                    ->description(__('Your main profile information'))
                                    ->schema([
                                        Grid::make()
                                            ->columns(12)
                                            ->schema([
                                                FileUpload::make('avatar')
                                                    ->label(__('Profile Photo'))
                                                    ->image()
                                                    ->imageEditor()
                                                    ->imageCropAspectRatio('1:1')
                                                    ->imageResizeMode('cover')
                                                    ->directory('public/profile')
                                                    ->maxFiles(1)
                                                    ->panelAspectRatio('1:1')
                                                    ->placeholder(__('Upload your profile photo'))
                                                    ->helperText(__('Square image recommended, will be cropped to 1:1 ratio'))
                                                    ->columnSpan(['sm' => 12, 'md' => 3]),

                                                Group::make()
                                                    ->columnSpan(['sm' => 12, 'md' => 9])
                                                    ->schema([
                                                        Group::make()
                                                            ->relationship('user')
                                                            ->schema([
                                                                TextInput::make('name')
                                                                    ->label(__('Full Name'))
                                                                    ->prefixIcon('heroicon-o-user')
                                                                    ->required()
                                                                    ->minLength(3)
                                                                    ->maxLength(150)
                                                                    ->placeholder(__('Enter your full name'))
                                                                    ->helperText(__('Your name as it will appear on your profile'))
                                                                    ->columnSpanFull(),
                                                            ]),

                                                        Grid::make(2)
                                                            ->schema([
                                                                TextInput::make('job_position')
                                                                    ->label(__('Job Title'))
                                                                    ->prefixIcon('heroicon-o-briefcase')
                                                                    ->placeholder(__('e.g., Senior Developer'))
                                                                    ->helperText(__('Your current professional title')),

                                                                TextInput::make('company')
                                                                    ->label(__('Company'))
                                                                    ->prefixIcon('heroicon-o-building-office')
                                                                    ->placeholder(__('e.g., Acme Inc.'))
                                                                    ->helperText(__('The company you currently work for')),
                                                            ]),

                                                        Grid::make(2)
                                                            ->schema([
                                                                TextInput::make('public_email')
                                                                    ->label(__('Public Email'))
                                                                    ->email()
                                                                    ->prefixIcon('heroicon-o-envelope')
                                                                    ->placeholder(__('your.email@example.com'))
                                                                    ->helperText(__('This email will be visible on your public profile')),

                                                                TextInput::make('localization')
                                                                    ->label(__('Location'))
                                                                    ->prefixIcon('heroicon-o-map-pin')
                                                                    ->placeholder(__('e.g., São Paulo, Brazil'))
                                                                    ->helperText(__('Enter your city and country of residence')),
                                                            ]),

                                                        Grid::make(2)
                                                            ->schema([
                                                                Toggle::make('is_open_to_work')
                                                                    ->label(__('Open to Work'))
                                                                    ->helperText(__('Show that you are available for new opportunities'))
                                                                    ->inline(true)
                                                                    ->onIcon('heroicon-m-sparkles')
                                                                    ->offIcon('heroicon-m-x-mark'),

                                                                Toggle::make('is_downloadable')
                                                                    ->label(__('Resume Available'))
                                                                    ->helperText(__('Allow visitors to download your resume/CV'))
                                                                    ->inline(true)
                                                                    ->onIcon('heroicon-m-arrow-down-tray')
                                                                    ->offIcon('heroicon-m-lock-closed'),
                                                            ]),
                                                    ]),
                                            ]),
                                    ]),

                                Section::make(__('Your Biography'))
                                    ->description(__('Tell your professional story'))
                                    ->icon('heroicon-o-document-text')
                                    ->collapsible(false)
                                    ->schema([
                                        RichEditor::make('about')
                                            ->label('')
                                            ->placeholder(__('Write about your professional background, experiences, and interests...'))
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'link',
                                                'bulletList',
                                                'orderedList',
                                                'redo',
                                                'undo',
                                            ])
                                            ->helperText(__('Write a compelling bio (Max: 2000 characters)'))
                                            ->maxLength(2000),
                                    ]),
                            ]),

                        Tabs\Tab::make(__('Professional Info'))
                            ->icon('heroicon-o-briefcase')
                            ->schema([
                                Grid::make()
                                    ->columns(12)
                                    ->schema([
                                        Section::make(__('Skills & Expertise'))
                                            ->description(__('Your professional capabilities'))
                                            ->icon('heroicon-o-academic-cap')
                                            ->collapsible(false)
                                            ->columnSpanFull()
                                            ->schema([
                                                TagsInput::make('skills')
                                                    ->separator(',')
                                                    ->placeholder(__('Add skills like PHP, JavaScript, UI/UX...'))
                                                    ->helperText(__('Add your professional skills, press Enter after each one'))
                                                    ->suggestions([
                                                        'PHP', 'Laravel', 'JavaScript', 'Vue.js', 'React',
                                                        'CSS', 'HTML', 'UI/UX', 'Project Management',
                                                    ]),
                                            ]),
                                    ]),

                                Section::make(__('Resume / CV'))
                                    ->description(__('Your professional resume'))
                                    ->icon('heroicon-o-document')
                                    ->collapsible(false)
                                    ->schema([
                                        FileUpload::make('document')
                                            ->label(__('Resume/CV File'))
                                            ->helperText(__('Accepted format: PDF only. Your resume will be available for download if enabled.'))
                                            ->placeholder(__('Drag and drop your CV or click to browse'))
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->preserveFilenames()
                                            ->openable()
                                            ->downloadable()
                                            ->directory('public/profile/document'),

                                        Placeholder::make('resume_info')
                                            ->content(__('Your resume is an essential part of your professional profile.'))
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tabs\Tab::make(__('Social Links'))
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                Section::make(__('Connect Your Profiles'))
                                    ->description(__('Add links to your social media and professional profiles'))
                                    ->schema([
                                        Repeater::make('social')
                                            ->cloneable()
                                            ->collapsible()
                                            ->collapsed()
                                            ->itemLabel(function (array $state): string {
                                                $title = $state['social_network'] ?? __('Card');

                                                return preg_replace('/<.*?>.*?<\/.*?>/', '', ucfirst($title));
                                            })
                                            ->reorderable()
                                            ->columns(6)
                                            ->schema([
                                                Toggle::make('is_active')
                                                    ->label(__('Active'))
                                                    ->helperText(__('Enable or disable this social link'))
                                                    ->inline(false)
                                                    ->default(true)
                                                    ->onIcon('heroicon-m-check-circle')
                                                    ->offIcon('heroicon-m-no-symbol'),
                                                Select::make('social_network')
                                                    ->columnSpan(2)
                                                    ->live()
                                                    ->required()
                                                    ->helperText(__('Choose your social network platform'))
                                                    ->placeholder(__('Select platform'))
                                                    ->prefixIcon('heroicon-o-user')
                                                    ->options([
                                                        'behance'       => 'Behance',
                                                        'codepen'       => 'Codepen',
                                                        'discord'       => 'Discord',
                                                        'dribbble'      => 'Dribbble',
                                                        'facebook'      => 'Facebook',
                                                        'github'        => 'Github',
                                                        'instagram'     => 'Instagram',
                                                        'linkedin'      => 'Linkedin',
                                                        'medium'        => 'Medium',
                                                        'npm'           => 'NPM',
                                                        'stackoverflow' => 'Stackoverflow',
                                                        'tiktok'        => 'Tiktok',
                                                        'twitch'        => 'Twitch',
                                                        'twitter'       => 'X / Twitter',
                                                        'vercel'        => 'Vercel',
                                                        'whatsapp'      => 'Whatsapp',
                                                        'youtube'       => 'Youtube',
                                                    ])
                                                    ->label(__('Social Network')),
                                                TextInput::make('profile_link')
                                                    ->prefix('https://')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->columnSpan(3)
                                                    ->placeholder(__('e.g., github.com/yourusername'))
                                                    ->helperText(__('Enter your profile URL without https://'))
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->label(__('Profile Link')),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
