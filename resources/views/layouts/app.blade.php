<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {{-- {!! JsonLd::generate() !!} --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        // var editor = ace.edit("editor");
        // editor.setTheme("ace/theme/monokai");
        // editor.session.setMode("ace/mode/javascript");
        // editor.setOptions({
        //     maxLines: Infinity
        // });
        // editor.setReadOnly(false);
    </script>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    <script src="https://kit.fontawesome.com/04a7502e69.js" crossorigin="anonymous"></script>
</body>
</html>
