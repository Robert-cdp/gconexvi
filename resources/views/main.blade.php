<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') · {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400..700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    
    @if (app()->environment('production'))
        @include('app.google')
    @endif
    
</head>

<body class="min-h-screen flex flex-col bg-slate-50 text-slate-800 antialiased">

    @include('app.header')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('app.footer')

    @stack('scripts')
</body>

</html>
