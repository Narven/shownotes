<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full font-sans antialiased">
    <div class="h-full bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <header class="grid items-center grid-cols-2 gap-2 py-10 lg:grid-cols-3">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </header>

        <div class="flex flex-col items-center p-6 mx-auto space-y-4 max-w-7xl lg:pg-8">
            <x-application-logo class="w-24 h-24 fill-current text-primary" />
            <x-button primary xl href="{{ route('register') }}">Get Started</x-button>
        </div>
    </div>
</body>

</html>
