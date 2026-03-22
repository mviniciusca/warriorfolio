<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use App\Services\MailService;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\View;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class ViewMail extends ViewRecord
{
    protected static string $resource = MailResource::class;

    protected static string $view = 'filament.resources.pages.view-mail';

    protected ?string $maxContentWidth = 'full';

    public bool $replyComposerVisible = false;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $replyData = [];

    public function mount(int|string $record): void
    {
        parent::mount($record);

        /** @var Mail $mail */
        $mail = $this->getRecord();

        if (! $mail->is_read) {
            $mail->update(['is_read' => true]);
        }
    }

    public function getTitle(): string|Htmlable
    {
        $subject = $this->getRecord()->subject;

        if (filled($subject)) {
            return Str::limit(strip_tags((string) $subject), 72);
        }

        return __('Mail');
    }

    public function getHeader(): ?\Illuminate\Contracts\View\View
    {
        return view('filament.resources.pages.view-mail-header', [
            'actions' => $this->getCachedHeaderActions(),
            'breadcrumbs' => filament()->hasBreadcrumbs() ? $this->getBreadcrumbs() : [],
            'renderHookScopes' => $this->getRenderHookScopes(),
        ]);
    }

    public function openReplyComposer(): void
    {
        $this->replyComposerVisible = true;
        $this->replyForm->fill(MailResource::getReplyFormState($this->getRecord()));
    }

    public function closeReplyComposer(): void
    {
        $this->replyComposerVisible = false;
        $this->replyForm->fill(MailResource::getReplyFormState($this->getRecord()));
    }

    public function submitReply(): void
    {
        $data = $this->replyForm->getState();

        $mail = Mail::query()->create([
            'email' => $data['email'],
            'name' => $data['name'],
            'subject' => $data['subject'],
            'body' => $data['body'],
            'is_sent' => true,
            'is_read' => true,
            'phone' => null,
        ]);

        if (env('SMTP_SERVICES')) {
            (new MailService([
                'email' => $mail->email,
                'name' => $mail->name,
                'subject' => $mail->subject,
                'body' => $mail->body,
            ], $mail))->send();
        } else {
            Notification::make()
                ->info()
                ->title(__('Reply saved'))
                ->body(__('SMTP services are disabled. The reply was saved in Sent but was not delivered.'))
                ->send();
        }

        $this->replyComposerVisible = false;
        $this->replyForm->fill(MailResource::getReplyFormState($this->getRecord()));
    }

    protected function getForms(): array
    {
        return [
            ...parent::getForms(),
            'replyForm' => $this->makeForm()
                ->schema(MailResource::getReplyFormSchema())
                ->statePath('replyData'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reply')
                ->iconButton()
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('primary')
                ->tooltip(__('Reply'))
                ->action(fn () => $this->openReplyComposer()),
            Action::make('back_to_inbox')
                ->iconButton()
                ->color('gray')
                ->tooltip(__('Back'))
                ->url(MailResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left'),
            DeleteAction::make()
                ->label(__('Move to Trash'))
                ->iconButton()
                ->color('gray')
                ->tooltip(__('Move to Trash'))
                ->icon('heroicon-o-trash'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(1)
            ->schema([
                View::make('infolists.components.mail-view'),
            ]);
    }
}
