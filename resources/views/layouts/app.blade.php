<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--
    <script src="/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> 
    --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor/ckeditor.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<body style="background-color: #f5eeff">
    <div id="app">
       @include('inc.navbar')

        <main class="py-4">
            <div class="container">
                @include('inc.messages')
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Replace the <textarea id="<namaID>"> with a CKEditor 4 in the view posts.create
        // instance, using default configuration.
        CKEDITOR.replace( 'texteditor1' );
    </script>
</body>
</html>
