@isset($scripts['body_scripts'])
{!! $scripts['body_scripts'] !!}
@endisset
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@filamentScripts
@vite('resources/js/app.js')