{{--

View Component: Body Scripts
----------------------------------------------------------------
This component is responsible for rendering the body scripts for the website.
-------------------------------------------------------------------
Data:
There is no data passed to this component.

--}}

@isset($scripts['body_scripts'])
    {!! $scripts['body_scripts'] !!}
@endisset
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
@filamentScripts
@vite('resources/js/app.js')
