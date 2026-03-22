<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MailResource;
use App\Filament\Resources\SettingResource;
use App\Models\Mail;
use App\Models\Setting;
use Filament\Facades\Filament;
use Filament\Widgets\Widget;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class NotificationsWidget extends Widget
{
    protected static string $view = 'filament.widgets.notifications-widget';

    protected int|string|array $columnSpan = 'full';

    /**
     * Bumps on dismiss so Livewire re-renders without a full page reload.
     */
    public int $renderVersion = 0;

    public function dismissNotification(string $id): void
    {
        $user = Filament::auth()->user();
        if ($user === null) {
            return;
        }

        $key = 'user_'.$user->id.'_dismissed_notifications';
        $dismissed = Cache::get($key, []);
        if (! is_array($dismissed)) {
            $dismissed = [];
        }
        if (! in_array($id, $dismissed, true)) {
            $dismissed[] = $id;
        }
        Cache::put($key, $dismissed, now()->addDays(30));

        $this->renderVersion++;
    }

    protected function getViewData(): array
    {
        $items = $this->gatherNotifications()
            ->reject(fn (array $n): bool => $this->isDismissed($n['id']))
            ->sortBy('severity')
            ->values();

        return [
            'notifications' => $items,
            'renderVersion' => $this->renderVersion,
        ];
    }

    protected function isDismissed(string $id): bool
    {
        $user = Filament::auth()->user();
        if ($user === null) {
            return false;
        }

        try {
            $dismissed = Cache::get('user_'.$user->id.'_dismissed_notifications', []);
        } catch (\Throwable) {
            return false;
        }

        return is_array($dismissed) && in_array($id, $dismissed, true);
    }

    /**
     * Lower severity sorts first (danger = 0).
     *
     * @return Collection<int, array{id: string, title: string, message: string, icon: string, color: string, url: ?string, severity: int}>
     */
    protected function gatherNotifications(): Collection
    {
        $user = Filament::auth()->user();
        if ($user === null) {
            return collect();
        }

        $items = collect();

        // —— Runtime / PHP ——
        if (version_compare(PHP_VERSION, '8.2.0', '<')) {
            $items->push([
                'id' => 'php-version-low',
                'title' => __('PHP version is below project requirements'),
                'message' => __('Warriorfolio expects PHP 8.2+. This server reports :version.', ['version' => PHP_VERSION]),
                'icon' => 'heroicon-o-code-bracket',
                'color' => 'danger',
                'severity' => 0,
                'url' => null,
            ]);
        }

        if (! extension_loaded('fileinfo')) {
            $items->push([
                'id' => 'ext-fileinfo-missing',
                'title' => __('PHP “fileinfo” extension is disabled'),
                'message' => __('Enable ext-fileinfo for reliable MIME detection on uploads and media.'),
                'icon' => 'heroicon-o-puzzle-piece',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        $dbDriver = config('database.default');
        if ($dbDriver === 'mysql' && ! extension_loaded('pdo_mysql')) {
            $items->push([
                'id' => 'ext-pdo-mysql-missing',
                'title' => __('PDO MySQL extension is missing'),
                'message' => __('Install/enable pdo_mysql so Laravel can talk to MySQL.'),
                'icon' => 'heroicon-o-circle-stack',
                'color' => 'danger',
                'severity' => 0,
                'url' => null,
            ]);
        }

        if ($dbDriver === 'sqlite' && ! extension_loaded('pdo_sqlite')) {
            $items->push([
                'id' => 'ext-pdo-sqlite-missing',
                'title' => __('PDO SQLite extension is missing'),
                'message' => __('Install/enable pdo_sqlite for the configured SQLite connection.'),
                'icon' => 'heroicon-o-circle-stack',
                'color' => 'danger',
                'severity' => 0,
                'url' => null,
            ]);
        }

        // —— Writable paths ——
        $writablePaths = [
            'storage' => \storage_path(),
            'storage/framework' => \storage_path('framework'),
            'storage/logs' => \storage_path('logs'),
            'bootstrap/cache' => app()->bootstrapPath('cache'),
        ];
        $failedWritable = [];
        foreach ($writablePaths as $label => $path) {
            if (! File::isDirectory($path) || ! is_writable($path)) {
                $failedWritable[] = $label;
            }
        }
        if ($failedWritable !== []) {
            $items->push([
                'id' => 'paths-not-writable',
                'title' => __('Some paths are not writable'),
                'message' => __('The web server user must be able to write to: :paths', ['paths' => implode(', ', $failedWritable)]),
                'icon' => 'heroicon-o-folder-arrow-down',
                'color' => 'danger',
                'severity' => 0,
                'url' => null,
            ]);
        }

        $freeBytes = @disk_free_space(\base_path());
        if (is_float($freeBytes) && $freeBytes > 0 && $freeBytes < (100 * 1024 * 1024)) {
            $items->push([
                'id' => 'disk-space-low',
                'title' => __('Low free disk space'),
                'message' => __('Less than 100 MB free on the project volume. Clear logs/cache or expand storage to avoid outages.'),
                'icon' => 'heroicon-o-server-stack',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        if (File::exists(\storage_path('framework/down'))) {
            $items->push([
                'id' => 'laravel-down-file',
                'title' => __('Laravel maintenance mode file is present'),
                'message' => __('storage/framework/down exists. Run php artisan up when the site should be public again.'),
                'icon' => 'heroicon-o-wrench-screwdriver',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        if ($dbDriver === 'sqlite') {
            $sqlitePath = config('database.connections.sqlite.database');
            if (is_string($sqlitePath) && $sqlitePath !== ':memory:') {
                if (File::exists($sqlitePath) && ! is_writable($sqlitePath)) {
                    $items->push([
                        'id' => 'sqlite-not-writable',
                        'title' => __('SQLite database file is not writable'),
                        'message' => __('Adjust permissions on the database file so migrations and writes succeed.'),
                        'icon' => 'heroicon-o-circle-stack',
                        'color' => 'danger',
                        'severity' => 0,
                        'url' => null,
                    ]);
                } elseif (! File::exists($sqlitePath) && (! File::isDirectory(dirname($sqlitePath)) || ! is_writable(dirname($sqlitePath)))) {
                    $items->push([
                        'id' => 'sqlite-dir-not-writable',
                        'title' => __('SQLite database directory is not writable'),
                        'message' => __('The folder for your SQLite file must be writable so Laravel can create the database.'),
                        'icon' => 'heroicon-o-circle-stack',
                        'color' => 'danger',
                        'severity' => 0,
                        'url' => null,
                    ]);
                }
            }
        }

        if (app()->environment('production') && ! File::exists(\base_path('composer.lock'))) {
            $items->push([
                'id' => 'composer-lock-missing',
                'title' => __('composer.lock is missing'),
                'message' => __('Deploy composer.lock with your project so production installs the same dependency versions as CI/staging.'),
                'icon' => 'heroicon-o-archive-box',
                'color' => 'warning',
                'severity' => 2,
                'url' => null,
            ]);
        }

        $viteManifest = \public_path('build/manifest.json');
        if (app()->environment('production') && ! File::exists($viteManifest)) {
            $items->push([
                'id' => 'vite-manifest-missing',
                'title' => __('Vite build output not found'),
                'message' => __('Run npm ci && npm run build so public/build/manifest.json exists for the front-end.'),
                'icon' => 'heroicon-o-sparkles',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        if (app()->environment('production') && File::exists(\public_path('hot'))) {
            $items->push([
                'id' => 'vite-hot-file-production',
                'title' => __('Vite dev “hot” file is present in production'),
                'message' => __('Remove public/hot or stop the dev server so assets are loaded from the built manifest, not localhost.'),
                'icon' => 'heroicon-o-fire',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        if (app()->environment('production') && function_exists('opcache_get_status')) {
            $opcache = opcache_get_status(false);
            if (is_array($opcache) && empty($opcache['opcache_enabled'])) {
                $items->push([
                    'id' => 'opcache-disabled',
                    'title' => __('OPcache is disabled'),
                    'message' => __('Enable OPcache in php.ini in production for faster responses and lower CPU use.'),
                    'icon' => 'heroicon-o-bolt',
                    'color' => 'warning',
                    'severity' => 2,
                    'url' => null,
                ]);
            }
        }

        $appUrlScheme = parse_url((string) config('app.url'), PHP_URL_SCHEME);
        $sessionSecureRaw = config('session.secure');
        if (app()->environment('production')
            && $appUrlScheme === 'https'
            && $sessionSecureRaw !== null
            && $sessionSecureRaw !== ''
            && ! filter_var($sessionSecureRaw, FILTER_VALIDATE_BOOLEAN)) {
            $items->push([
                'id' => 'session-cookie-not-secure',
                'title' => __('Session cookies are explicitly non-secure'),
                'message' => __('APP_URL uses HTTPS but SESSION_SECURE_COOKIE is set to false. Use true or remove it so the framework can choose a safe default.'),
                'icon' => 'heroicon-o-lock-closed',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        if (app()->environment('production') && config('session.driver') === 'array') {
            $items->push([
                'id' => 'session-array-production',
                'title' => __('Session driver is “array” in production'),
                'message' => __('Sessions are discarded after every request. Use file, database, or redis for real visitors.'),
                'icon' => 'heroicon-o-user-circle',
                'color' => 'warning',
                'severity' => 2,
                'url' => null,
            ]);
        }

        $mailer = config('mail.default');
        if (in_array($mailer, ['smtp', 'ses', 'postmark', 'resend'], true) && ! filled(config('mail.from.address'))) {
            $items->push([
                'id' => 'mail-from-missing',
                'title' => __('Default mail “from” address is empty'),
                'message' => __('Set MAIL_FROM_ADDRESS (and MAIL_FROM_NAME) so outbound mail has a valid sender.'),
                'icon' => 'heroicon-o-at-symbol',
                'color' => 'warning',
                'severity' => 1,
                'url' => $this->settingsAppearanceOrGeneralUrl(),
            ]);
        }

        if (! filled(config('recaptcha.site_key')) || ! filled(config('recaptcha.secret_key'))) {
            $items->push([
                'id' => 'recaptcha-not-configured',
                'title' => __('ReCAPTCHA is not fully configured'),
                'message' => __('Set RECAPTCHA_SITE_KEY and RECAPTCHA_SECRET_KEY if your public forms rely on Google ReCAPTCHA.'),
                'icon' => 'heroicon-o-shield-check',
                'color' => 'warning',
                'severity' => 2,
                'url' => $this->settingsAppearanceOrGeneralUrl(),
            ]);
        }

        // —— Email / SMTP ——
        $smtpEnabled = filter_var(env('SMTP_SERVICES', false), FILTER_VALIDATE_BOOLEAN);
        $smtpHostSet = filled(config('mail.mailers.smtp.host'));
        if (! $smtpEnabled || ! $smtpHostSet) {
            $items->push([
                'id' => 'smtp-missing',
                'title' => __('Outbound email not fully configured'),
                'message' => __('Enable SMTP_SERVICES and set mail.mailers.smtp.host so the app can send mail.'),
                'icon' => 'heroicon-o-envelope',
                'color' => 'warning',
                'severity' => 1,
                'url' => $this->settingsAppearanceOrGeneralUrl(),
            ]);
        }

        if (app()->environment('production') && config('mail.default') === 'log') {
            $items->push([
                'id' => 'mail-log-production',
                'title' => __('Mail driver is “log” in production'),
                'message' => __('Messages are not delivered to real inboxes. Switch to smtp or another mailer when you go live.'),
                'icon' => 'heroicon-o-document-text',
                'color' => 'warning',
                'severity' => 1,
                'url' => $this->settingsAppearanceOrGeneralUrl(),
            ]);
        }

        // —— Security ——
        if (Hash::check('password', $user->password)) {
            $items->push([
                'id' => 'default-password',
                'title' => __('Default password still in use'),
                'message' => __('Change your account password in security settings.'),
                'icon' => 'heroicon-o-shield-exclamation',
                'color' => 'danger',
                'severity' => 0,
                'url' => $this->settingsSecurityUrl(),
            ]);
        }

        if (app()->environment('production') && config('app.debug')) {
            $items->push([
                'id' => 'debug-enabled-production',
                'title' => __('APP_DEBUG is on in production'),
                'message' => __('Turn off debug in production to avoid leaking errors and environment details.'),
                'icon' => 'heroicon-o-bug-ant',
                'color' => 'danger',
                'severity' => 0,
                'url' => null,
            ]);
        }

        $appUrl = (string) config('app.url', '');
        if (app()->environment('production') && $appUrl !== '' && str_starts_with($appUrl, 'http:')) {
            $items->push([
                'id' => 'http-app-url-production',
                'title' => __('APP_URL uses HTTP in production'),
                'message' => __('Prefer HTTPS in APP_URL for cookies, redirects, and asset URLs.'),
                'icon' => 'heroicon-o-lock-open',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        // —— Storage ——
        if (! File::exists(\public_path('storage'))) {
            $items->push([
                'id' => 'storage-link-missing',
                'title' => __('Public storage link missing'),
                'message' => __('Run php artisan storage:link so uploads and media URLs work.'),
                'icon' => 'heroicon-o-folder-open',
                'color' => 'warning',
                'severity' => 1,
                'url' => null,
            ]);
        }

        // —— Performance hints (production) ——
        if (app()->environment('production') && config('cache.default') === 'array') {
            $items->push([
                'id' => 'cache-array-production',
                'title' => __('Cache driver is “array” in production'),
                'message' => __('Consider redis, database, or file cache so data persists between requests.'),
                'icon' => 'heroicon-o-cpu-chip',
                'color' => 'warning',
                'severity' => 2,
                'url' => null,
            ]);
        }

        if (app()->environment('production') && config('queue.default') === 'sync') {
            $items->push([
                'id' => 'queue-sync-production',
                'title' => __('Queue connection is “sync” in production'),
                'message' => __('Long jobs block HTTP requests. Use database or redis queues for better reliability.'),
                'icon' => 'heroicon-o-queue-list',
                'color' => 'warning',
                'severity' => 2,
                'url' => null,
            ]);
        }

        // —— Inbox signal (optional nudge) ——
        $unreadInbox = Mail::query()
            ->where('is_read', false)
            ->where('is_sent', false)
            ->count();
        if ($unreadInbox >= 5) {
            $items->push([
                'id' => 'inbox-backlog',
                'title' => trans_choice(
                    '{1} :count unread inbox message|[2,*] :count unread inbox messages',
                    $unreadInbox,
                    ['count' => $unreadInbox]
                ),
                'message' => __('Several contact messages are waiting. Open the inbox when you can.'),
                'icon' => 'heroicon-o-inbox-stack',
                'color' => 'warning',
                'severity' => 2,
                'url' => MailResource::canViewAny() ? MailResource::getUrl('index') : null,
            ]);
        }

        return $items;
    }

    protected function settingsSecurityUrl(): ?string
    {
        $id = Setting::query()->value('id');
        if ($id === null || $id === '') {
            return null;
        }

        return SettingResource::getUrl('edit-security', ['record' => $id]);
    }

    /**
     * Fallback when no dedicated “mail” settings route exists in UI.
     */
    protected function settingsAppearanceOrGeneralUrl(): ?string
    {
        $id = Setting::query()->value('id');
        if ($id === null || $id === '') {
            return null;
        }

        return SettingResource::getUrl('edit', ['record' => $id]);
    }
}
