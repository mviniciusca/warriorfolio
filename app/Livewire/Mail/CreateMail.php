<?php

namespace App\Livewire\Mail;

use Filament\Forms;
use App\Models\Mail;
use Filament\Forms\Components\TextInput;
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
                    ->required()
                    ->hiddenLabel()
                    ->placeholder('Full Name')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->hiddenLabel()
                    ->email()
                    ->maxLength(50)
                    ->placeholder('E-mail Address')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->hiddenLabel()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->maxLength(20)
                    ->columnSpanFull()
                    ->placeholder('Phone Number')
                    ->required(),
                Forms\Components\TextInput::make('subject')
                    ->placeholder('Subject')
                    ->hiddenLabel()
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
                    ->hiddenLabel()
                    ->required()
                    ->maxLength(1300)
                    ->placeholder('Your Message')
                    ->columnSpanFull(),
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
