<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script>
    <style>
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
<body class="bg-gray-100">
<div class="container mx-auto p-1 pb-10">
{{--    nav--}}
     <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-8 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Логотип -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <div class="flex items-center justify-between gap-2">
                            {{--            <img class="h-16 w-16" src="{{ asset('image/logoCrmConsulting.png') }}" alt="Logo">--}}
                            <svg width="70" height="70" viewBox="0 0 156 149" fill="#0C3C60" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.4997 4.09984C24.3997 9.49984 24.3997 10.8998 22.2997 11.5998C13.9997 14.2998 9.59973 16.6998 6.09973 20.4998C-4.40027 31.8998 -0.500275 45.8998 17.1997 59.5998C19.7997 61.6998 19.8997 61.7998 18.3997 65.8998C15.5997 74.0998 20.3997 82.2998 32.2997 89.6998C47.0997 98.9998 64.5997 103.9 85.9997 104.7C107.2 105.5 120.1 102.6 132.9 93.9998C140.2 89.1998 140.5 87.5998 133.8 89.9998C117.1 95.7998 84.2997 94.8998 60.7997 87.8998C50.6997 84.8998 40.8997 79.7998 37.1997 75.4998C33.5997 71.4998 32.9997 69.3998 35.7997 70.4998C66.3997 83.0998 87.8997 87.4998 115.5 86.7998C129.9 86.3998 132.1 86.0998 137.8 83.7998C147 79.9998 150.7 77.0998 153.5 71.5998C157.4 63.7998 156.4 56.4998 150.4 47.7998C142.3 36.0998 116 22.0998 89.1997 14.9998L84.7997 13.8998L85.4997 8.79984L86.1997 3.79984L81.8997 6.39984C79.4997 7.89984 75.3997 10.1998 72.7997 11.6998C70.0997 13.0998 67.9997 14.8998 67.9997 15.4998C67.9997 17.1998 78.9997 33.9998 80.0997 33.9998C80.5997 33.9998 80.9997 32.9998 80.9997 31.6998C80.9997 27.2998 82.1997 26.5998 88.0997 27.9998C104.6 31.7998 128.5 43.0998 137.7 51.4998C144.9 57.8998 145.8 60.2998 142.5 63.5998C138 68.0998 130.3 69.4998 110.5 69.3998C90.6997 69.3998 80.9997 67.7998 62.0997 61.8998C33.6997 52.7998 10.9997 37.4998 14.9997 30.0998C15.7997 28.3998 25.2997 23.9998 27.8997 23.9998C28.3997 23.9998 29.7997 26.8998 31.1997 30.4998L33.5997 36.8998L39.7997 26.5998C43.2997 20.8998 46.2997 15.3998 46.5997 14.3998C46.9997 12.7998 44.9997 11.4998 34.4997 6.19984C27.5997 2.79984 21.7997 -0.000160253 21.4997 -0.000160253C21.2997 -0.000160253 21.6997 1.89984 22.4997 4.09984Z" fill=""/>
                                <path d="M50.9999 48.8001C48.4999 49.2001 46.6999 49.9001 46.7999 50.5001C46.9999 51.0001 49.1999 52.3001 51.6999 53.3001C55.3999 54.7001 60.0999 55.1001 77.3999 55.4001C94.3999 55.7001 100.3 56.2001 107.9 57.9001C113.1 59.0001 117.5 59.8001 117.7 59.6001C118.1 59.2001 107.2 55.0001 101 53.1001C88.9999 49.6001 61.6999 47.2001 50.9999 48.8001Z" fill=""/>
                                <path d="M48.4995 103C47.6995 105.7 50.7995 112.7 54.0995 115.4C59.5995 120.1 67.4995 122.3 80.4995 122.8C94.8995 123.3 101.399 122.2 110.899 117.4C116.999 114.4 126.999 105.6 125.699 104.4C125.499 104.2 123.299 105.1 120.899 106.4C102.999 116.3 70.1995 115.4 54.0995 104.6C49.5995 101.5 48.9995 101.4 48.4995 103Z" fill=""/>
                                <path d="M112.5 123.1C105.9 127.7 95.8 130.4 86 130.2C81.3 130.2 76 129.6 74.3 129.1C72.5 128.6 71 128.5 71 128.9C71 130 77.1 135.6 80 137.1C81.4 137.8 85.6 138.4 89.5 138.4C97.9 138.4 104.6 135.7 110.3 130.2C113.8 126.8 117.6 121.2 116.8 120.6C116.6 120.4 114.7 121.6 112.5 123.1Z" fill=""/>
                                <path d="M108.7 137.5C104.3 141.3 97.3996 144 92.0996 144H88.5996L90.5996 146.1C91.7996 147.2 94.5996 148.4 96.8996 148.7C102.2 149.4 108 145.8 111 139.9C113.9 134.3 113.2 133.6 108.7 137.5Z" fill=""/>
                            </svg>
                            <p class="text-[#0C3C60] text-lg">CRM Consulting</p>
                        </div>
                    </a>
                </div>

                <!-- Меню -->
                <div class="hidden sm:flex sm:space-x-8">
                    <a href="#" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-indigo-500 hover:text-gray-700 text-sm font-medium">Уроки</a>
                    <a href="#" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-indigo-500 hover:text-gray-700 text-sm font-medium">Записи уроков</a>
                    <a href="https://crmconsulting.kz/#b3635" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-indigo-500 hover:text-gray-700 text-sm font-medium">О нас </a>
                    <a href="https://crmconsulting.kz/business_club" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-indigo-500 hover:text-gray-700 text-sm font-medium">Бизнес клуб</a>
                    <a href="https://crmconsulting.kz/#b2307" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-indigo-500 hover:text-gray-700 text-sm font-medium">Контакты</a>
                </div>

                <!-- Смена языка и кнопки аутентификации -->
                <div class="flex items-center space-x-4">
                    <!-- Смена языка -->
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <div>
                            <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Язык
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 011.414 0L10 11.293l3.293-3.586a1 1 0 011.414 1.414l-4 4.5a1 1 0 01-1.414 0l-4-4.5a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <!-- Выпадающий список -->
                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" x-cloak>
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Казахский</a>
{{--                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">English</a>--}}
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Русский</a>
                            </div>
                        </div>
                    </div>

                    <!-- Аутентификация -->
                    @if (Route::has('login'))
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 this.closest('form').submit();" class="ml-4 text-sm text-gray-700 underline">
                                        Logout
                                    </a>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Вход</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Регистрация</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
{{--    About--}}
    <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-4 py-4 px-8 rounded-lg shadow-lg">CRM School</h1>
    <div class="flex flex-col  max-w-full md:items-center md:flex-row mx-auto px-4 md:px-8 py-6 bg-white rounded-lg shadow-lg mb-6 ">
        <div class="md:w-1/4  mb-4 md:mb-0">
            <img src="{{ asset('/image/crm-svg.png') }}" alt="Изображение" class="w-full h-auto rounded-lg">
        </div>
        <div class="md:w-3/4  md:pl-4">
            <p class="text-lg text-gray-800 mb-4">В нашей обучающей практике CRM вы получите глубокие знания и практические навыки, необходимые для успешной работы с системами управления взаимоотношениями с клиентами (CRM). Мы предлагаем комплексный курс, который включает в себя теоретические основы, практические упражнения и реальные проекты, чтобы вы могли применить свои знания на практике с первого дня.</p>
            <p class="text-gray-700">Присоединяйтесь к нашей обучающей практике и станьте экспертом в области CRM!</p>
        </div>
    </div>

    <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-10 py-4 px-8 rounded-lg shadow-lg">Обучающая практика CRM</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 ">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">Обучение практики CRM</h3>
            <div class="text-gray-600 mb-4">Дата проведение: 2024-06-01</div>
            <div class="flex items-center mb-4 ">
                <img src="{{ asset('/image/profile1.jpg') }}" alt="Lecturer" class="w-16 h-15 rounded-full mr-4 ">
                <div>
                    <h4>Специалист:</h4>
                    <p class="text-sky-700 hover:text-sky-400">Даурен Тайыров </p>
                </div>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    @php
                        $seats = [
                            ['number' => 1, 'status' => 'reserved'],
                            ['number' => 2, 'status' => 'reserved'],
                            ['number' => 3, 'status' => 'reserved'],
                            ['number' => 4, 'status' => 'reserved'],
                            ['number' => 5, 'status' => 'reserved'],
                            ['number' => 6, 'status' => 'available'],
                            ['number' => 7, 'status' => 'available'],
                            ['number' => 8, 'status' => 'available'],
                            ['number' => 9, 'status' => 'available'],
                            ['number' => 10, 'status' => 'available'],
                            ['number' => 11, 'status' => 'available'],
                            ['number' => 12, 'status' => 'available'],
                        ];

                        $availableSeats = 0;
                        $reservedSeats = 0;

                        foreach ($seats as $seat) {
                            if ($seat['status'] === 'available') {
                                $availableSeats++;
                            } else {
                                $reservedSeats++;
                            }
                        }
                    @endphp

                    @foreach ($seats as $seat)
                        <div class="relative seat {{ $seat['status'] === 'reserved' ? 'seat-reserved' : 'seat-available' }}">{{ $seat['number'] }}
                            @if( $seat['status'] == 'reserved' )
                                <svg class="h-6 w-6 text-red-500 absolute top-50 right-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"/>
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between">
                <div class="flex items-center text-green-400">
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="5" y1="12" x2="9" y2="16" />
                        <line x1="5" y1="12" x2="9" y2="8" />
                    </svg>
                    <span class="ml-2">{{ $reservedSeats }} Заполнено</span>
                </div>

                <div class="flex items-center text-cyan-500">
                    <span class="mr-2"> {{ $availableSeats }} Доступно</span>
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">Обучение практики CRM</h3>
            <div class="text-gray-600 mb-4">Дата проведение: 2024-06-01</div>
            <div class="flex items-center mb-4 ">
                <img src="{{ asset('/image/profile1.jpg') }}" alt="Lecturer" class="w-16 h-15 rounded-full mr-4 ">
                <div>
                    <h4>Специалист:</h4>
                    <p class="text-sky-700 hover:text-sky-400">Даурен Тайыров </p>
                </div>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    @php
                        $seats = [
                            ['number' => 1, 'status' => 'reserved'],
                            ['number' => 2, 'status' => 'reserved'],
                            ['number' => 3, 'status' => 'reserved'],
                            ['number' => 4, 'status' => 'reserved'],
                            ['number' => 5, 'status' => 'reserved'],
                            ['number' => 6, 'status' => 'available'],
                            ['number' => 7, 'status' => 'available'],
                            ['number' => 8, 'status' => 'available'],
                            ['number' => 9, 'status' => 'available'],
                            ['number' => 10, 'status' => 'available'],
                            ['number' => 11, 'status' => 'available'],
                            ['number' => 12, 'status' => 'available'],
                        ];

                        $availableSeats = 0;
                        $reservedSeats = 0;

                        foreach ($seats as $seat) {
                            if ($seat['status'] === 'available') {
                                $availableSeats++;
                            } else {
                                $reservedSeats++;
                            }
                        }
                    @endphp

                    @foreach ($seats as $seat)
                        <div class="relative seat {{ $seat['status'] === 'reserved' ? 'seat-reserved' : 'seat-available' }}">{{ $seat['number'] }}
                            @if( $seat['status'] == 'reserved' )
                                <svg class="h-6 w-6 text-red-500 absolute top-50 right-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"/>
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between">
                <div class="flex items-center text-green-400">
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="5" y1="12" x2="9" y2="16" />
                        <line x1="5" y1="12" x2="9" y2="8" />
                    </svg>
                    <span class="ml-2">{{ $reservedSeats }} Заполнено</span>
                </div>

                <div class="flex items-center text-cyan-500">
                    <span class="mr-2"> {{ $availableSeats }} Доступно</span>
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">Обучение практики CRM</h3>
            <div class="text-gray-600 mb-4">Дата проведение: 2024-06-01</div>
            <div class="flex items-center mb-4 ">
                <img src="{{ asset('/image/profile1.jpg') }}" alt="Lecturer" class="w-16 h-15 rounded-full mr-4 ">
                <div>
                    <h4>Специалист:</h4>
                    <p class="text-sky-700 hover:text-sky-400">Даурен Тайыров </p>
                </div>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    @php
                        $seats = [
                            ['number' => 1, 'status' => 'reserved'],
                            ['number' => 2, 'status' => 'reserved'],
                            ['number' => 3, 'status' => 'reserved'],
                            ['number' => 4, 'status' => 'reserved'],
                            ['number' => 5, 'status' => 'reserved'],
                            ['number' => 6, 'status' => 'available'],
                            ['number' => 7, 'status' => 'available'],
                            ['number' => 8, 'status' => 'available'],
                            ['number' => 9, 'status' => 'available'],
                            ['number' => 10, 'status' => 'available'],
                            ['number' => 11, 'status' => 'available'],
                            ['number' => 12, 'status' => 'available'],
                        ];

                        $availableSeats = 0;
                        $reservedSeats = 0;

                        foreach ($seats as $seat) {
                            if ($seat['status'] === 'available') {
                                $availableSeats++;
                            } else {
                                $reservedSeats++;
                            }
                        }
                    @endphp

                    @foreach ($seats as $seat)
                        <div class="relative seat {{ $seat['status'] === 'reserved' ? 'seat-reserved' : 'seat-available' }}">{{ $seat['number'] }}
                            @if( $seat['status'] == 'reserved' )
                                <svg class="h-6 w-6 text-red-500 absolute top-50 right-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"/>
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between">
                <div class="flex items-center text-green-400">
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="5" y1="12" x2="9" y2="16" />
                        <line x1="5" y1="12" x2="9" y2="8" />
                    </svg>
                    <span class="ml-2">{{ $reservedSeats }} Заполнено</span>
                </div>

                <div class="flex items-center text-cyan-500">
                    <span class="mr-2"> {{ $availableSeats }} Доступно</span>
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">Обучение практики CRM</h3>
            <div class="text-gray-600 mb-4">Дата проведение: 2024-06-01</div>
            <div class="flex items-center mb-4 ">
                <img src="{{ asset('/image/profile1.jpg') }}" alt="Lecturer" class="w-16 h-15 rounded-full mr-4 ">
                <div>
                    <h4>Специалист:</h4>
                    <p class="text-sky-700 hover:text-sky-400">Даурен Тайыров </p>
                </div>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    @php
                        $seats = [
                            ['number' => 1, 'status' => 'reserved'],
                            ['number' => 2, 'status' => 'reserved'],
                            ['number' => 3, 'status' => 'reserved'],
                            ['number' => 4, 'status' => 'reserved'],
                            ['number' => 5, 'status' => 'reserved'],
                            ['number' => 6, 'status' => 'available'],
                            ['number' => 7, 'status' => 'available'],
                            ['number' => 8, 'status' => 'available'],
                            ['number' => 9, 'status' => 'available'],
                            ['number' => 10, 'status' => 'available'],
                            ['number' => 11, 'status' => 'available'],
                            ['number' => 12, 'status' => 'available'],
                        ];

                        $availableSeats = 0;
                        $reservedSeats = 0;

                        foreach ($seats as $seat) {
                            if ($seat['status'] === 'available') {
                                $availableSeats++;
                            } else {
                                $reservedSeats++;
                            }
                        }
                    @endphp

                    @foreach ($seats as $seat)
                        <div class="relative seat {{ $seat['status'] === 'reserved' ? 'seat-reserved' : 'seat-available' }}">{{ $seat['number'] }}
                            @if( $seat['status'] == 'reserved' )
                                <svg class="h-6 w-6 text-red-500 absolute top-50 right-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"/>
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between">
                <div class="flex items-center text-green-400">
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="5" y1="12" x2="9" y2="16" />
                        <line x1="5" y1="12" x2="9" y2="8" />
                    </svg>
                    <span class="ml-2">{{ $reservedSeats }} Заполнено</span>
                </div>

                <div class="flex items-center text-cyan-500">
                    <span class="mr-2"> {{ $availableSeats }} Доступно</span>
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner Section -->
<div class="relative max-w-full h-64  md:h-96 bg-cover bg-center  bg-small bg-medium bg-large" >
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 md:px-8">
{{--        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-4">Welcome to Our Website</h1>--}}
{{--        <p class="text-lg md:text-xl lg:text-2xl text-white">Explore our services and offerings to find the best solutions for your needs.</p>--}}
    </div>
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
                <ul class="flex space-x-4 justify-center md:justify-end">
                    <li>
                        <a href="https://crmconsulting.kz" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.04c-5.52 0-10 4.48-10 10 0 4.41 3.6 8.07 8.17 8.92v-6.31h-2.45v-2.61h2.45v-1.99c0-2.43 1.45-3.76 3.67-3.76 1.06 0 1.97.08 2.23.11v2.58h-1.52c-1.19 0-1.42.56-1.42 1.39v1.83h2.85l-.37 2.61h-2.48v6.31c4.57-.85 8.17-4.51 8.17-8.92 0-5.52-4.48-10-10-10z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.23 5.924c-.81.36-1.69.6-2.61.71a4.45 4.45 0 0 0 1.97-2.45c-.86.51-1.81.88-2.83 1.08a4.36 4.36 0 0 0-7.55 3.97 12.36 12.36 0 0 1-8.96-4.55 4.38 4.38 0 0 0-.59 2.19 4.34 4.34 0 0 0 1.94 3.61 4.3 4.3 0 0 1-1.97-.54v.05a4.35 4.35 0 0 0 3.49 4.26 4.4 4.4 0 0 1-1.96.07 4.37 4.37 0 0 0 4.08 3.03 8.72 8.72 0 0 1-5.37 1.85A8.2 8.2 0 0 1 2 18.13a12.3 12.3 0 0 0 6.69 1.96c8.02 0 12.42-6.63 12.42-12.38 0-.19 0-.38-.01-.57.86-.62 1.6-1.39 2.18-2.27z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2v-6zm1 8.75c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
