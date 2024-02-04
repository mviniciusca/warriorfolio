<?php

namespace App\Livewire;

use Filament\Forms;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use App\Models\Newsletter as ModelsNewsletter;
use Filament\Forms\Concerns\InteractsWithForms;

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
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->placeholder('Email')
                    ->hiddenLabel()
                    ->email()
                    ->unique('newsletters', 'email')
                    ->required(),
            ])
            ->statePath('data')
            ->model(Newsletter::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = ModelsNewsletter::create($data);

        Notification::make()
            ->title('Thanks for subscribing!')
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
