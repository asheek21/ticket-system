<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-600">
                                TicketHub
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                            @foreach (['Tickets' => 'home', 'Ticket Types' => 'ticket-type.index'] as $navItem => $route)
                                <a href="{{ route($route) }}" @class([
                                    'inline-flex items-center px-1 pt-1 text-sm font-medium',
                                    'border-primary-500 border-b-2 text-gray-900' => request()->routeIs($route),
                                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' => !request()->routeIs(
                                        $route),
                                ])>
                                    {{ $navItem }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-3 px-4 py-2 bg-gray-50 rounded-lg">
                            <div
                                class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-danger hover:bg-red-600 rounded-lg transition duration-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    @stack('custom-script')
</body>

</html>
