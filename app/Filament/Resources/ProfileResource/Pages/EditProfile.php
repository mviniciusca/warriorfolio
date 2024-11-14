<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Actions;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

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
            ->schema([
                Section::make(__('Personal Information'))
                    ->description(__('This information will be displayed on your public profile page.'))
                    ->icon('heroicon-o-user')
                    ->columns(4)
                    ->schema([
                        Group::make()->schema([
                            CuratorPicker::make('avatar')
                                ->label('Public Profile Picture')
                                ->directory('public/profile'),
                        ])
                            ->columnSpan(1),
                        Group::make()
                            ->columns(2)
                            ->schema([
                                Group::make()
                                    ->relationship('user')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label(__('Full Name'))
                                            ->prefixIcon('heroicon-o-user')
                                            ->helperText(__('Your full name will be displayed on your public profile. Max: 150 characters'))
                                            ->required()
                                            ->minLength(3)
                                            ->maxLength(150),
                                    ]),
                                TextInput::make('job_position')
                                    ->label(__('Job Position'))
                                    ->prefixIcon('heroicon-o-briefcase')
                                    ->helperText(__('Your job position will be displayed on your public profile. Max: 150 characters'))
                                    ->minLength(3)
                                    ->maxLength(150),
                                TextInput::make('localization')
                                    ->label(__('Localization'))
                                    ->prefixIcon('heroicon-o-map-pin')
                                    ->helperText(__('Your localization will be displayed on your public profile. Max: 150 characters'))
                                    ->minLength(3)
                                    ->maxLength(150),
                                TagsInput::make('skills')
                                    ->separator(',')
                                    ->label(__('Skills'))
                                    ->placeholder(__('Your skills'))
                                    ->helperText(__('Add your skills. Press enter to add a new.')),

                            ])
                            ->columnSpan(3),
                    ]),
                Section::make(__('Resume'))
                    ->description(__('Manager information about your resume.'))
                    ->icon('heroicon-o-document')
                    ->schema([
                        FileUpload::make('document')
                            ->preserveFilenames()
                            ->openable()
                            ->downloadable()
                            ->label('Resume')
                            ->placeholder('Attach Your Resume')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('public/profile/document'),
                        Toggle::make('is_downloadable')
                            ->inline(false)
                            ->label('Downloadable')
                            ->helperText('If you want to allow users to download your CV, enable this option.'),
                        Toggle::make('is_open_to_work')
                            ->inline(false)
                            ->label('Open to Work')
                            ->helperText('If you are open to work, a icon will be displayed on your profile with a link to your linkedin profile.'),
                    ])
                    ->columns(3),
                Section::make('About You')
                    ->description('This information will be displayed on your public profile page.')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        RichEditor::make('about')
                            ->label('')
                            ->maxLength(2000)
                            ->helperText('Write about yourself. Enter to break a line, twice to paragraph. Max 2000 characters')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'redo',
                                'underline',
                                'undo',
                            ])->columnSpanFull(),
                    ]),

            ]);
    }
}
