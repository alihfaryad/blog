<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="/storage/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/storage/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/storage/images/favicon-16x16.png">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload="loadEditor()">
    <div id="app">
        @include('includes.navbar')
        @include('includes.messages')
        @yield('content')
        @include('includes.footer')
    </div>
    <!-- Scripts -->
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        function loadEditor(){
            if(document.getElementById("article-ckeditor")){
                CKEDITOR.replace('article-ckeditor');
                CKEDITOR.config.protectedSource.push(/<code>[\s\S]*?<\/code>/gi);
                CKEDITOR.on( 'instanceReady', function( evt ) {
                    evt.editor.dataProcessor.htmlFilter.addRules( {
                        elements: {
                            img: function(el) {
                                el.addClass('img-fluid justify-content-around');
                            },
                            pre: function(el) {
                                el.addClass('prettyprint');
                            }
                        }
                    });
                });
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    <script src="https://kit.fontawesome.com/04a7502e69.js" crossorigin="anonymous"></script>
</body>
</html>
