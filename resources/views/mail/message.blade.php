<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['subject'] ?? __('Mail Message') }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .mail-wrapper {
            width: 100%;
            min-width: 540px;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .mail-container {
            border-radius: 8px;
            padding: 20px;
        }

        .mail-message {
            color: #35383d;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="mail-wrapper">
        <div class="mail-container">
            <p class="mail-message">
                {!! $data['body'] !!}
            </p>
        </div>
    </div>
</body>

</html>