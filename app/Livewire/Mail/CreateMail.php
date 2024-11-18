<?php

namespace App\Livewire\Mail;

use App\Models\Mail;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
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
                    ->hiddenLabel()
                    ->prefixIcon('heroicon-o-user')
                    ->placeholder(__('Your Name'))
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->hiddenLabel()
                    ->email()
                    ->prefixIcon('heroicon-o-envelope')
                    ->placeholder(__('Your Email Address'))
                    ->maxLength(140)
                    ->minLength(5)
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('phone')
                    ->hiddenLabel()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->maxLength(20)
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-phone')
                    ->placeholder(__('Your Phone Number'))
                    ->required(),
                TextInput::make('subject')
                    ->prefixIcon('heroicon-o-tag')
                    ->placeholder(__('Message Subject'))
                    ->maxLength(140)
                    ->minLength(5)
                    ->hiddenLabel()
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('body')
                    ->hiddenLabel()
                    ->required()
                    ->rows(5)
                    ->minLength(20)
                    ->maxLength(300)
                    ->placeholder(__('Your Message. Min 20 and Max 300 characters.'))
                    ->columnSpanFull(),
            ])
            ->statePath('data')
            ->model(Mail::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Mail::create($data);

        Notification::make()
            ->title('Mail Sent')
            ->success()
            ->send();

        $this->reset('data');

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.mail.create-mail');
    }
}
