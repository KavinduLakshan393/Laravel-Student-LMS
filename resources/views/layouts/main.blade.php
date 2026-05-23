<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel LMS Project')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-xl font-bold">
                @yield('header', 'Laravel LMS Project')
            </h1>

            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
                    <a href="{{ route('courses.index') }}" class="text-blue-600 hover:underline">Courses</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
                @endguest
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('status'))
            <div class="mb-4 p-4 bg-blue-100 text-blue-800 rounded">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="max-w-7xl mx-auto px-4 py-6 text-center text-gray-500">
        <p>&copy; {{ date('Y') }} Laravel LMS Project</p>
    </footer>
</body>
</html>