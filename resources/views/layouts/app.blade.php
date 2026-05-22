<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Flash Messages -->
            @if(session('success'))
                <div style="background-color: #d4edda; padding: 15px; margin: 10px 0; color: #155724; border-left: 4px solid #28a745; border-radius: 4px;">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background-color: #f8d7da; padding: 15px; margin: 10px 0; color: #721c24; border-left: 4px solid #dc3545; border-radius: 4px;">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
            @endif

            @if(session('status'))
                <div style="background-color: #d1ecf1; padding: 15px; margin: 10px 0; color: #0c5460; border-left: 4px solid #17a2b8; border-radius: 4px;">
                    <strong>Info!</strong> {{ session('status') }}
                </div>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
