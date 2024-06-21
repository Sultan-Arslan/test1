<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
    <style>


        /*вниз не трогать*/
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }

        .bg-small {
            background-image: url('{{ asset('image/CRM_banner_small.png') }}');
        }

        @media (min-width: 640px) {
            .bg-medium {
                background-image: url('{{ asset('image/CRM_banner_medium.png') }}');
            }
        }

        @media (min-width: 1024px) {
            .bg-large {
                background-image: url('{{ asset('image/CRM_banner_large.png') }}');
            }
        }

        @media (min-width: 1680px) {
            .bg-large {
                background-image: url('{{ asset('image/CRM_banner_largeX.png') }}');
            }
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen font-montserrat">
<div class="container mx-auto p-1 pb-10 flex-grow">
    @include('layouts.navigation')
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</div>
<!-- Footer Section -->
<footer class="bg-gray-800 text-white py-4">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <ul>
                <li></li>
            </ul>
            <div class="text-center md:text-center">
                <p>&copy; @php echo date('Y'); @endphp <a href="#">CRM Consulting.</a> All rights reserved.</p>
            </div>
            <div class="mt-4 md:mt-0">
{{--                <ul class="flex space-x-4 justify-center md:justify-end">--}}
{{--                    <li>--}}
{{--                        <a href="https://crmconsulting.kz" class="text-gray-400 hover:text-white">--}}
{{--                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M12 2.04c-5.52 0-10 4.48-10 10 0 4.41 3.6 8.07 8.17 8.92v-6.31h-2.45v-2.61h2.45v-1.99c0-2.43 1.45-3.76 3.67-3.76 1.06 0 1.97.08 2.23.11v2.58h-1.52c-1.19 0-1.42.56-1.42 1.39v1.83h2.85l-.37 2.61h-2.48v6.31c4.57-.85 8.17-4.51 8.17-8.92 0-5.52-4.48-10-10-10z"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#" class="text-gray-400 hover:text-white">--}}
{{--                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M22.23 5.924c-.81.36-1.69.6-2.61.71a4.45 4.45 0 0 0 1.97-2.45c-.86.51-1.81.88-2.83 1.08a4.36 4.36 0 0 0-7.55 3.97 12.36 12.36 0 0 1-8.96-4.55 4.38 4.38 0 0 0-.59 2.19 4.34 4.34 0 0 0 1.94 3.61 4.3 4.3 0 0 1-1.97-.54v.05a4.35 4.35 0 0 0 3.49 4.26 4.4 4.4 0 0 1-1.96.07 4.37 4.37 0 0 0 4.08 3.03 8.72 8.72 0 0 1-5.37 1.85A8.2 8.2 0 0 1 2 18.13a12.3 12.3 0 0 0 6.69 1.96c8.02 0 12.42-6.63 12.42-12.38 0-.19 0-.38-.01-.57.86-.62 1.6-1.39 2.18-2.27z"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#" class="text-gray-400 hover:text-white">--}}
{{--                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M12 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2v-6zm1 8.75c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
</footer>
</body>
</html>
