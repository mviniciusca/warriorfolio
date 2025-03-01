<?php

namespace App\Livewire\Mail;

use App\Models\Mail;
use App\Models\User;
use App\Notifications\NewMailNotification;
use Exception;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateMail extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->maxLength(50)
                    ->minLength(5)
                    ->required()
                    ->label(__('Full Name'))
                    ->prefixIcon('heroicon-o-user')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email()
                    ->prefixIcon('heroicon-o-envelope')
                    ->maxLength(140)
                    ->minLength(8)
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('phone')
                    ->label(__('Phone Number'))
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->maxLength(20)
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-phone')
                    ->required(),
                TextInput::make('subject')
                    ->prefixIcon('heroicon-o-tag')
                    ->maxLength(140)
                    ->minLength(5)
                    ->label(__('Message Subject'))
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('body')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                    ])
                    ->required()
                    ->label(__('Message'))
                    ->minLength(20)
                    ->maxLength(1200)
                    ->placeholder(__('Your Message. Min 20 and Max 1200 characters.'))
                    ->columnSpanFull(),
            ])
            ->statePath('data')
            ->model(Mail::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        try {
            $record = Mail::create($data);
            Notification::make()
                ->title(__('Message sent!'))
                ->success()
                ->send();
        } catch (Exception $e) {
            Notification::make()
                ->title(__('Error on sent message!'))
                ->danger()
                ->send();
            Log::error($e->getMessage());
        }

        if (env('SMTP_SERVICES')) {
            try {
                $user = User::first(['email']);
                $user->notify(new NewMailNotification($data));
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }

        $this->reset('data');

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.mail.create-mail');
    }
}
