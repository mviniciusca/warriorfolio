@props(['page'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-black text-zinc-200 w-full h-screen">
    <div class="grid">
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    </div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<script>
$(document).ready(function(){
  // Adiciona efeito de rolagem suave a todos os links internos
  $("a[href^='#']").on('click', function(event) {

    // Certifica-se de que this.hash tenha um valor antes de substituir o comportamento padrão
    if (this.hash !== "") {
      // Impede o comportamento padrão do link
      event.preventDefault();

      // Armazena o hash
      var hash = this.hash;

      // Usa o método animate do jQuery para adicionar o efeito de rolagem suave
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1500, function(){

        // Adiciona o hash (#) na URL quando concluído a rolagem (comportamento padrão do navegador)
        window.location.hash = hash;
      });
    }
  });
});
</script>
</body>
</html>
