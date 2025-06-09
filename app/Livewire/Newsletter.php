<?php

namespace App\Livewire;

use App\Models\Newsletter as ModelNewsletter;
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Newsletter extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public $buttonText = 'Subscribe';

    public $is_section_filled_inverted = false;

    public $buttonIcon = 'mail-outline';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('email')
                    ->placeholder(__('Email address'))
                    ->prefixIcon('heroicon-o-envelope')
                    ->minLength(5)
                    ->maxLength(255)
                    ->hiddenLabel()
                    ->email()
                    ->unique('newsletters', 'email')
                    ->required(),
            ])
            ->statePath('data')
            ->model(self::class);
    }

    /**
     * Subscribe to the newsletter.
     *
     * @return void
     */
    public function create(): void
    {
        $data = $this->form->getState();

        try {
            $record = ModelNewsletter::create($data);

            Notification::make()
                ->title(__('Thanks for subscribing!'))
                ->success()
                ->send();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Notification::make()
                ->title(__('Error! Please, try again later.'))
                ->error()
                ->send();
        }

        $this->reset('data');

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.newsletter', ['buttonIcon' => $this->buttonIcon, 'is_section_filled_inverted' => $this->is_section_filled_inverted]);
    }
}
