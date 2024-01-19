<?php

namespace App\Livewire\Mail;

use Filament\Forms;
use App\Models\Mail;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

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
                Forms\Components\TextInput::make('name')
                    ->maxLength(50)
                    ->label('Full Name')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone Number')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->maxLength(20)
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('subject')
                    ->maxLength(140)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('body')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'redo',
                        'underline',
                        'undo',
                    ])
                    ->required()
                    ->maxLength(1300)
                    ->columnSpanFull()
                    ->label('Message'),
            ])->columns(2)
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