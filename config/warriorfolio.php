<?php

/*
   |--------------------------------------------------------------------------
   | Warriorfolio Configuration
   |--------------------------------------------------------------------------
   |

*/

return [
    /** Application */
    'app_version' => env('APP_VERSION', '2.1.3'),

    /** Notes (Blog) Configuration */
    'app_blog_basepath' => env('APP_BLOG_BASEPATH', 'blog/'),
    'app_blog_path'     => env('APP_BLOG_PATH', '/blog/post/'),
    'app_blog_url_end'  => env('APP_BLOG_URL_END', '.html'),

    /** Web Services */
    'mobile_country_code' => env('MOBILE_COUNTRY_CODE', '55'),
    'whatsapp_web_url'    => env('WHATSAPP_WEB_URL', 'https://wa.me/'),

    /** SMTP Services */
    'smtp_services' => env('SMTP_SERVICES', 'false'),

    /** GitHub API */
    'github_api_token'              => env('GITHUB_API_TOKEN', null),
    'github_api_url'                => env('GITHUB_API_URL', 'https://api.github.com'),
    'github_api_url_repo'           => env('GITHUB_API_URL_REPO', 'https://api.github.com/repos'),
    'github_username'               => env('GITHUB_USERNAME', 'mviniciusca'),
    'github_show_only_repositories' => env('GITHUB_SHOW_ONLY_REPOSITORIES', 'warriorfolio'),
    'github_repo_quantity'          => env('GITHUB_REPO_QUANTITY', 9),

];
