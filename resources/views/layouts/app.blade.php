<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Welcome' }} - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload="loadEditor()">
    <div id="app">
        @include('includes.navbar')
        {{-- <main class="py-4 container"> --}}
            @include('includes.messages')
            @yield('content')
        {{-- </main> --}}
        @include('includes.footer')
    </div>
    <!-- Scripts -->
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        function loadEditor(){
            if(document.getElementById("article-ckeditor")){
                CKEDITOR.replace('article-ckeditor');
                CKEDITOR.on( 'instanceReady', function( evt ) {
                    evt.editor.dataProcessor.htmlFilter.addRules( {
                        elements: {
                            img: function(el) {
                                el.addClass('img-fluid justify-content-around');
                            }
                        }
                    });
                });
            }
        }
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/04a7502e69.js" crossorigin="anonymous"></script>
</body>
</html>
