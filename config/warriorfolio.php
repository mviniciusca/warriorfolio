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
];
