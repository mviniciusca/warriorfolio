<?php

namespace App\Filament\Pages\Mail;

use Filament\Pages\Page;
use Illuminate\Contracts\View\View;

class Inbox extends Page
{
    protected static ?string $navigationIcon    = 'heroicon-o-mail';
    protected static ?string $navigationLabel   = 'Inbox';
    protected static ?string $navigationGroup   = 'Mail';
    protected static ?string $slug              = 'mail/inbox';
    protected static ?string $modelLabel        = 'Mail';
    protected static ?string $title             = '';

    protected static string $view = 'filament.pages.mail.inbox';


}
