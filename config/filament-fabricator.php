<?php

// config for Z3d0X/FilamentFabricator

use App\Filament\Resources\PageResource;
use App\Models\Page;

return [
    'routing' => [
        'enabled' => true,
        'prefix'  => null,
    ],

    'layouts' => [
        'namespace' => 'App\\Filament\\Fabricator\\Layouts',
        'path'      => app_path('Filament/Fabricator/Layouts'),
        'register'  => [
            //
        ],
    ],

    'page-blocks' => [
        'namespace' => 'App\\Filament\\Fabricator\\PageBlocks',
        'path'      => app_path('Filament/Fabricator/PageBlocks'),
        'register'  => [
            //
        ],
    ],

    'middleware' => [
        Illuminate\Cookie\Middleware\EncryptCookies::class,
        Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        Illuminate\Session\Middleware\StartSession::class,
        Illuminate\View\Middleware\ShareErrorsFromSession::class,
        Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        Illuminate\Routing\Middleware\SubstituteBindings::class,
        App\Http\Middleware\PasswordProtectedPageMiddleware::class,
    ],

    'page-model'       => Page::class,
    'page-resource'    => PageResource::class,
    'enable-view-page' => false,
    'table_name'       => 'pages',
];
