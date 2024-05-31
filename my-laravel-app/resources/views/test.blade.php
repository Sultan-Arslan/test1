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
{{--    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script>--}}
    <!-- Подключение Alpine.js с отложенной загрузкой -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
    <!-- Подключение Inputmask -->
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/inputmask.min.js"></script>
</head>
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


    @include('layouts.navigation')

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
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="lesson_id" value="">
                <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Записаться на урок</button>
            </form>
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
