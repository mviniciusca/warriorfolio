<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>{{ $data['subject'] }}</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f0f4f8;
            }

            img {
                max-width: 100%;
                height: auto;
            }

            h1 {
                color: #2c3e50;
            }

            p {
                margin-bottom: 20px;
            }

            .content-container {
                background-color: #ffffff;
                border-radius: 8px;
                padding: 20px;
            }
        </style>
    </head>

    <body>
        <a href="{{ url(config('app.url', env('APP_URL'))) }}" style="text-decoration: none;">
            <img alt="Logo" src="{{ asset('img/core/demo/mail-default.png') }}"
                style="width: 150px; margin-bottom: 20px;">
        </a>

        <div class="content-container">
            <h1 style="color: #2c3e50; font-size: 24px; margin-bottom: 20px;">
                {{ $data['subject'] ?? __('New Message') }}
            </h1>
            <p style="margin-bottom: 20px;">{!! $data['body'] !!}</p>
        </div>

        <p style="margin-top: 20px; font-size: 12px; color: #7f8c8d;">
            {{ __('This email was sent from') }} {{ config('app.name') }}.
            {{ __('If you did not expect this email, please ignore it.') }}
        </p>
    </body>

</html>
