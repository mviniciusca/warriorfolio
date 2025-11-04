<?php

namespace App\Livewire\Mail;

use App\Models\Mail;
use App\Models\User;
use App\Notifications\NewMailNotification;
use App\Traits\WithRecaptcha;
use Exception;
use Filament\Forms\Components\Textarea;
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
    use WithRecaptcha;

    public ?array $data = [];

    public $is_section_filled_inverted = '';

    public function mount(): void
    {
        $this->form->fill();
        $this->initializeWithRecaptcha();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->maxLength(50)
                    ->minLength(5)
                    ->required()
                    ->extraAttributes(['class' => 'border'])
                    ->hiddenLabel()
                    ->placeholder(__('Full Name'))
                    ->prefixIcon('heroicon-o-user')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->placeholder(__('Email Address'))
                    ->email()
                    ->extraAttributes(['class' => 'border'])
                    ->hiddenLabel()
                    ->prefixIcon('heroicon-o-envelope')
                    ->maxLength(140)
                    ->minLength(8)
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('phone')
                    ->extraAttributes(['class' => 'border'])
                    ->placeholder(__('Phone Number'))
                    ->tel()
                    ->hiddenLabel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->maxLength(20)
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-phone')
                    ->required(),
                TextInput::make('subject')
                    ->extraAttributes(['class' => 'border'])
                    ->hiddenLabel()
                    ->prefixIcon('heroicon-o-tag')
                    ->maxLength(140)
                    ->minLength(5)
                    ->placeholder(__('Message Subject'))
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('body')
                    ->extraAttributes(['class' => 'border'])
                    ->hiddenLabel()
                    ->rows(5)
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
        if (! $this->verifyRecaptcha()) {
            return;
        }

        $data = $this->form->getState();

        try {
            $record = Mail::create($data);
            Notification::make()
                ->title(__('Message sent!'))
                ->success()
                ->send();

            $this->reset(['data', 'recaptchaToken']);
            $this->form->fill();
            $this->dispatch('formSubmitted');
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
    }

    public function render(): View
    {
        return view('livewire.mail.create-mail');
    }
}
