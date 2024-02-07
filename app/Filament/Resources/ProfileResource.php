<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Profile;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProfileResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfileResource\RelationManagers;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getNavigationLabel(): string
    {
        return __('Profile');
    }
    public static function getNavigationGroup(): ?string
    {
        return __('App Sections');
    }
    protected static ?int $navigationSort = 0;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Forms\Components\FileUpload::make('avatar')
                        ->image()
                        ->imageEditor()
                        ->label('Profile Picture')
                        ->placeholder('Upload your picture')
                        ->directory('profile/avatar'),
                    Forms\Components\Select::make('avatar_position')
                        ->label('Profile Picture Position')
                        ->options([
                            'bg-center' => 'Center',
                            'bg-top' => 'Top',
                            'bg-bottom' => 'Bottom',
                        ]),
                    Forms\Components\Select::make('avatar_size')
                        ->label('Profile Picture Size')
                        ->options([
                            'bg-auto' => 'Auto',
                            'bg-cover' => 'Cover',
                            'bg-contain' => 'Contain',
                        ]),
                    Forms\Components\Toggle::make('is_open_to_work')
                        ->label('Open to Work')
                        ->helperText('If you are open to work, a icon will be displayed on your profile with a link to your linkedin profile.'),
                    Forms\Components\FileUpload::make('document')
                        ->preserveFilenames()
                        ->openable()
                        ->downloadable()
                        ->label('Resume/CV')
                        ->placeholder('Attach your resume')
                        ->visibility('private')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('profile/documents'),
                    Forms\Components\Toggle::make('is_downloadable')
                        ->label('Downloadable CV')
                        ->helperText('If you want to allow users to download your CV, enable this option.'),
                ])
                    ->columnSpan(1),
                Section::make('Profile Information')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Group::make()->relationship('user')->schema([
                            Forms\Components\TextInput::make('name')
                                ->maxLength(255)
                                ->label('Full Name')
                                ->required()
                                ->helperText('Your name will be displayed publicly'),
                            Forms\Components\TextInput::make('email')
                                ->maxLength(255)
                                ->label('Email Address')
                                ->required()
                                ->helperText('Only you can see your email address'),
                        ])->columns(2),
                        Group::make()->schema([
                            Forms\Components\TextInput::make('localization')
                                ->maxLength(255)
                                ->helperText('Your localization will be displayed publicly'),
                            Forms\Components\TextInput::make('job_position')
                                ->label('Job Position')
                                ->maxLength(255)
                                ->helperText('Your job position will be displayed publicly'),
                            Forms\Components\TagsInput::make('skills')
                                ->separator(',')
                                ->helperText('Type a word and press enter to add a new skill')
                                ->label('Your Skills')
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('about')->label('About (html allowed)')
                                ->maxLength(65535)
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'link',
                                    'redo',
                                    'underline',
                                    'undo',
                                ])->columnSpanFull(),
                        ])->columns(2),
                    ])->columnSpan(5),
                Section::make('Social Media')
                    ->icon('heroicon-o-share')
                    ->schema([
                        Group::make()->schema([
                            Forms\Components\TextInput::make('github')
                                ->placeholder('github.com/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('twitter')
                                ->placeholder('www.twitter.com/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('linkedin')
                                ->placeholder('www.linkedin.com/in/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('medium')
                                ->placeholder('www.medium.com/@your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('devto')
                                ->placeholder('www.dev.to/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('dribbble')
                                ->placeholder('www.dribbble.com/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('instagram')
                                ->placeholder('www.instagram.com/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('facebook')
                                ->placeholder('www.facebook.com/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('youtube')
                                ->placeholder('www.youtube.com/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('twitch')
                                ->placeholder('www.twitch.com/your_username')
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-link'),
                        ])
                            ->columns(3)
                            ->columnSpan(4),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),
            ])->columns(6);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->size(90)
                    ->circular()
                    ->label('Picture')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('job_position')
                    ->label('Job Position'),
                Tables\Columns\IconColumn::make('is_open_to_work')
                    ->label('Open to Work')
                    ->boolean()
                    ->alignCenter()
                    ->icon(function (Profile $record) {
                        return $record->is_open_to_work ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle';
                    }),
                Tables\Columns\IconColumn::make('is_downloadable')
                    ->label('Downloadable Resume')
                    ->boolean()
                    ->alignCenter()
                    ->icon(function (Profile $record) {
                        return $record->is_downloadable ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle';
                    }),

            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
