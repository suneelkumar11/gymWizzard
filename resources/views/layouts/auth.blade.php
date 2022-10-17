<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>Gym Wizzard - @yield('title')</title>
</head>
<body>
    <div id="app">
        @include('includes.header')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('includes.footer')
</body>
</html>