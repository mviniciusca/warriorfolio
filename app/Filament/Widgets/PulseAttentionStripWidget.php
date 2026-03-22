<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\Dashboard;
use App\Filament\Resources\MailResource;
use App\Filament\Resources\PageCommentResource;
use App\Models\Mail;
use App\Models\PageComment;
use Filament\Widgets\Widget;

class PulseAttentionStripWidget extends Widget
{
    protected static string $view = 'filament.widgets.pulse-attention-strip';

    protected static bool $isDiscovered = false;

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        $unreadMailCount = Mail::query()
            ->where('is_read', false)
            ->where('is_sent', false)
            ->count();

        $pendingCommentsCount = PageComment::query()->pending()->count();

        return [
            'unreadMailCount' => $unreadMailCount,
            'pendingCommentsCount' => $pendingCommentsCount,
            'mailIndexUrl' => MailResource::getUrl('index'),
            'commentsIndexUrl' => PageCommentResource::getUrl('index'),
            'checksTabUrl' => Dashboard::getUrl().'?tab=checks',
        ];
    }
}
