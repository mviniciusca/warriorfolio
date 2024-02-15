<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\ProfileResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Fieldset;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationLabel(): string
    {
        return __('Public Profile');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Personal Information')
                ->description('This information will be displayed on your public profile page.')
                ->icon('heroicon-o-user')
                ->columns(4)
                ->schema([
                    Group::make()->schema([
                        CuratorPicker::make('avatar')
                            ->label('Public Profile Picture')
                            ->directory('public/profile'),
                    ])->columnSpan(1),
                    Group::make()->columns(2)->schema([
                        Group::make()
                            ->relationship('user')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Full Name')
                                    ->placeholder('Your full name')
                                    ->helperText('Your full name will be displayed on your public profile. Max: 150 characters')
                                    ->required()
                                    ->minLength(3)
                                    ->maxLength(150),
                            ]),
                        TextInput::make('job_position')
                            ->label('Job Position')
                            ->placeholder('Your job position')
                            ->helperText('Your job position will be displayed on your public profile. Max: 150 characters')
                            ->minLength(3)
                            ->maxLength(150),
                        TextInput::make('localization')
                            ->label('Localization')
                            ->placeholder('Your localization')
                            ->helperText('Your localization will be displayed on your public profile. Max: 150 characters')
                            ->minLength(3)
                            ->maxLength(150),
                        TagsInput::make('skills')
                            ->separator(',')
                            ->label('Skills')
                            ->placeholder('Your skills')
                            ->helperText('Add your skills. Press enter to add a new.'),

                    ])->columnSpan(3),
                    Group::make()
                        ->schema([
                            Fieldset::make()->schema([
                                FileUpload::make('document')
                                    ->preserveFilenames()
                                    ->openable()
                                    ->downloadable()
                                    ->label('Resume/CV')
                                    ->placeholder('Attach Your Resume')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->directory('public/profile/document'),
                                Toggle::make('is_downloadable')
                                    ->inline(false)
                                    ->label('Downloadable CV')
                                    ->helperText('If you want to allow users to download your CV, enable this option.'),
                                Toggle::make('is_open_to_work')
                                    ->inline(false)
                                    ->label('Open to Work')
                                    ->helperText('If you are open to work, a icon will be displayed on your profile with a link to your linkedin profile.'),
                            ])->columns(3),
                        ])->columnSpanFull(),
                ]),
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
