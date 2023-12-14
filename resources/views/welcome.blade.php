<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warriorfusion 2</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-zinc-950 text-zinc-700">
    <div id="app">
        <div class="flex flex-col items-center justify-center min-h-screen">
            <div class="flex justify-center items-center">
                <img src="https://raw.githubusercontent.com/mviniciusca/warriorfolio/BC-v2/public/img/logo-v2.png"
                    alt="Warriorfusion 2" class="h-36">
            </div>
            <h1 class="text-3xl md:text-6xl tracking-tighter text-center font-bold"> deploying the what's next.</h1>
            <p class="text-md text-center mt-6">check the status of development of this product</p>
            <div class="flex text-3xl text-zinc-600 hover:opacity-80 cursor-pointer transition-all duration-200 mt-2">
                <a href="https://github.com/mviniciusca/warriorfolio/" target="new">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
