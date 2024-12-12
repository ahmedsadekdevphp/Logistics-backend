<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

</head>

<body>
    <div class="d-flex flex-column min-vh-100 bg-light">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="container py-3">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow-1">
            <div class="container py-5">
                @yield('content')
            </div>
        </main>

        <!-- Footer (Optional) -->
        <footer class="bg-dark text-white py-3">
            <div class="container text-center">
                © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
