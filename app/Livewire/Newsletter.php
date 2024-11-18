<?php

namespace App\Livewire;

use App\Models\Newsletter as ModelsNewsletter;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Newsletter extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public $buttonText = 'Subscribe';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                TextInput::make('name')
                    ->hiddenLabel()
                    ->maxLength(200)
                    ->required()
                    ->placeholder(__('Name')),
                TextInput::make('email')
                    ->placeholder(__('Email'))
                    ->hiddenLabel()
                    ->email()
                    ->unique('newsletters', 'email')
                    ->required(),
            ])
            ->statePath('data')
            ->model(self::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = ModelsNewsletter::create($data);

        Notification::make()
            ->title(__('Thanks for subscribing!'))
            ->success()
            ->send();

        $this->reset('data');

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.newsletter');
    }
}
