<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Todo List</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @include('libraries/styles')
</head>
<body>
    @include('components/navbar')
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    @include('components/footer')
    @include('libraries/scripts')
</body>
</html>
