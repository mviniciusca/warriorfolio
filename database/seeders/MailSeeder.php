<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailSeeder extends Seeder
{
    /**
     * Mensagens de exemplo para testar Inbox, filtros, badges e aba Enviadas.
     */
    public function run(): void
    {
        DB::table('mails')->truncate();

        Mail::factory()->welcome()->create();

        Mail::factory()->count(5)->received()->unread()->create();
        Mail::factory()->count(7)->received()->read()->create();
        Mail::factory()->count(3)->received()->read()->important()->create();
        Mail::factory()->count(4)->received()->unread()->important()->create();

        Mail::factory()->count(6)->sent()->create();
    }
}
