@if($info->body_scripts)
{!! $info->body_scripts !!}
@endif
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
@filamentScripts
@vite('resources/js/app.js')
