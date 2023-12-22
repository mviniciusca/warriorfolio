<?php

namespace App\Livewire\Mail;

use App\Models\Mail;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

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
                    ->autofocus()
                    ->maxLength(50)
                    ->required()
                    ->placeholder('Name'),
                Forms\Components\TextInput::make('email')
                    ->autofocus()
                    ->email()
                    ->required()
                    ->placeholder('Email'),
                Forms\Components\TextInput::make('subject')
                    ->autofocus()
                    ->maxLength(140)
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Subject'),
                Forms\Components\RichEditor::make('body')
                    ->autofocus()
                    ->required()
                    ->maxLength(1300)
                    ->columnSpanFull()
                    ->placeholder('Message'),
            ])->columns(2)
            ->statePath('data')
            ->model(Mail::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Mail::create($data);

        $this->reset('data');

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.mail.create-mail');
    }
}
