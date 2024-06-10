@extends('layouts.app')

@section('content')
<div>
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
        @if($lessons->isEmpty())
            <p>Нет доступных уроков.</p>
        @else
            @foreach ($lessons as $lesson)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">{{ $lesson->title }}</h3>
            <div class="text-gray-600 mb-4">Дата проведение: {{ $lesson->date }}</div>
            <div class="flex items-center mb-4 ">
                <img src="{{ asset('/image/profile1.jpg') }}" alt="Lecturer" class="w-16 h-15 rounded-full mr-4 ">
                <div>
                    <h4>Специалист:</h4>
                    <p class="text-sky-700 hover:text-sky-400">{{ $lesson->specialist->name }}</p>
                    {{ $lesson->students->count() }}
                    {{ $lesson->capacity-$lesson->students->count() }}
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap">
                    @php
                        $students = $lesson->students->count();
                        $capacity = $lesson->capacity;
                           $number = $capacity - $students;
                            echo $students;
                            $placed = array();
                            $place = new stdClass();
                               $place->number = $students;
                               $place->status = ($capacity <= $students) ? "reserved" : "available";
                                for ($i = 1; $i <= $capacity; $i++) {
                               $place = new stdClass();
                               $place->number = $i;
                               $place->status = ($i <= $students) ? "reserved" : "available";
                               $placed[] = $place;
//                           }
                            dd($placed) ;

                     @endphp

                    @php
                           $seats = array();
                           $students = $lesson->students->count();
                           $capacity = $lesson->capacity;
                           $number = $capacity - $students;
//                           for ($i = 1; $i <= $capacity; $i++) {
//                               $place = new stdClass();
//                               $place->number = $i;
//                               $place->status = ($i <= $students) ? "reserved" : "available";
//                               $seats[] = $place;
//                           }
                            for ($i = 1; $i <= 12; $i++) {
//                               $place = new stdClass();
//                               $place->number = $i;
//                               $place->status = ($i <= 5) ? "available" : "reserved";
                               $seats[] = ['number'=>$i, 'status'=>'available'];
                           }

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
            @endforeach
        @endif

    </div>
</div>

<!-- Banner Section -->
<div class="relative max-w-full h-64 mt-4 md:h-96 bg-cover bg-center  bg-small bg-medium bg-large" >
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 md:px-8">
{{--        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-4">Welcome to Our Website</h1>--}}
{{--        <p class="text-lg md:text-xl lg:text-2xl text-white">Explore our services and offerings to find the best solutions for your needs.</p>--}}
    </div>
</div>


@endsection
