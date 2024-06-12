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

    <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-6 py-4 px-8 rounded-lg shadow-lg">Обучающая практика CRM</h1>

    <!-- Форма поиска и фильтрации -->
    <form action="{{ route('home') }}" method="GET" class="mb-4">
        <div class="flex flex-wrap gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Поиск уроков..." class="border p-2 rounded">
            <input type="date" name="start_date" value="{{ request('start_date') }}" placeholder="Дата начала" class="border p-2 rounded">
            <input type="date" name="end_date" value="{{ request('end_date') }}" placeholder="Дата окончания" class="border p-2 rounded">
            <input type="text" name="specialist" value="{{ request('specialist') }}" placeholder="Специалист" class="border p-2 rounded">
            <label class="flex items-center">
                <input type="checkbox" name="free_only" value="1" {{ request('free_only') ? 'checked' : '' }} class="mr-2">
                Свободные уроки
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="my_lessons" value="1" {{ request('my_lessons') ? 'checked' : '' }} class="mr-2">
                Мои уроки
            </label>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Поиск</button>
        </div>
    </form>



@if($lessons->isEmpty())
            <p>Нет доступных уроков.</p>
        @else
            {{--  сетка для уроков--}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 ">
            @foreach ($lessons as $lesson)
            {{--   Карточка урока --}}
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col	justify-around	">
            <div>
            <h3 class="text-xl font-semibold mb-4">{{ $lesson->title }}</h3>
            <div class="text-gray-600 mb-4">Дата проведение: {{ $lesson->date }}</div>
            <div class="flex items-center mb-4 ">
                <img src="{{ asset('storage/' . $lesson->specialist->photo) }}" alt="Lecturer" class="w-16 h-15 rounded-full mr-4 ">
                <div>
                    <h4>Специалист:</h4>
                    <p class="text-sky-700 hover:text-sky-400">{{ $lesson->specialist->name }}</p>
                </div>
            </div>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    @php
                        $students = $lesson->students->count();
                        $capacity = $lesson->capacity;
                        $placed = array();

                        for ($i = 1; $i <= $capacity; $i++) {
                               $place = new stdClass();
                               $place->number = $i;
                               $place->status = ($i <= $students) ? "reserved" : "available";
                               $placed[] = $place;
                        }

                    @endphp

                    @foreach ($placed as $seat)
                        <div class="relative seat {{ $seat->status === 'reserved' ? 'seat-reserved' : 'seat-available' }}">{{ $seat->number }}
                            @if( $seat->status == 'reserved' )
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
            <div >
                <div class="flex justify-between mb-4  ">
                <div class="flex items-center text-green-400">
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="5" y1="12" x2="9" y2="16" />
                        <line x1="5" y1="12" x2="9" y2="8" />
                    </svg>
                    <span class="ml-2">{{ $lesson->students->count() }} Заполнено</span>
                </div>

                <div class="flex items-center text-cyan-500">
                    <span class="mr-2">
                        {{ $lesson->capacity-$lesson->students->count() }} Доступно</span>
                    <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                    </svg>
                </div>
            </div>
                <div class="flex justify-center w-full">
            @auth
                @php
                    $isRegistered = DB::table('lesson_users')
                        ->where('lesson_id', $lesson->id)
                        ->where('user_id', Auth::id())
                        ->exists();
                @endphp

                @if ($isRegistered)
                            <div class="p-4 bg-gray shadow-lg rounded-lg">
                                <p class="text-xl font-semibold text-center text-green-600">
                                    Вы записаны
                                </p>
                            </div>
                @else
                    <form action="{{ route('lessons.register', $lesson->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded">Записаться на урок</button>
                    </form>
                @endif
            @else
                <p class="text-xl font-semibold text-center text-red-400">Пожалуйста, <a href="{{ route('login') }}" class="underline">войдите</a> для записи на урок.</p>
            @endauth
            </div>
            </div>
        </div>
            @endforeach
        </div>

                <!-- Пагинация -->
        <div class="mt-4 ">
{{--                    {{ $lessons->links() }}--}}
                    {{ $lessons->links('vendor.pagination.custom') }}
        </div>
    @endif
</div>

{{--<div class="container">--}}
{{--    <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-10 py-4 px-8 rounded-lg shadow-lg">{{__('main.lessons')}}</h1>--}}
{{--    <div class="flex gap-5">--}}
{{--        <a href="{{ route('lessons.create') }}" class="bg-green-500 text-white px-4 py-2 mt-4 rounded mb-4">{{__('main.Create Lesson')}}</a>--}}
{{--        <a href="{{ route('user_roles.index') }}" class="bg-orange-500 text-white px-4 py-2 mt-4 rounded mb-4">{{__('main.Specialist')}}</a>--}}
{{--    </div>--}}

{{--    <!-- Форма поиска и фильтрации -->--}}
{{--    <form action="{{ route('home') }}" method="GET" class="mb-4">--}}
{{--        <div class="flex flex-wrap gap-4">--}}
{{--            <input type="text" name="search" value="{{ request('search') }}" placeholder="Поиск уроков..." class="border p-2 rounded">--}}
{{--            <input type="date" name="start_date" value="{{ request('start_date') }}" placeholder="Дата начала" class="border p-2 rounded">--}}
{{--            <input type="date" name="end_date" value="{{ request('end_date') }}" placeholder="Дата окончания" class="border p-2 rounded">--}}
{{--            <input type="text" name="specialist" value="{{ request('specialist') }}" placeholder="Специалист" class="border p-2 rounded">--}}
{{--            <label class="flex items-center">--}}
{{--                <input type="checkbox" name="free_only" value="1" {{ request('free_only') ? 'checked' : '' }} class="mr-2">--}}
{{--                Свободные уроки--}}
{{--            </label>--}}
{{--            <label class="flex items-center">--}}
{{--                <input type="checkbox" name="my_lessons" value="1" {{ request('my_lessons') ? 'checked' : '' }} class="mr-2">--}}
{{--                Мои уроки--}}
{{--            </label>--}}
{{--            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Поиск</button>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--    <div class="container mx-auto">--}}
{{--        <h1 class="text-2xl font-bold mb-4">Панель управления</h1>--}}

{{--        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">--}}
{{--            @foreach ($lessons as $lesson)--}}
{{--                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-around">--}}
{{--                    <div>--}}
{{--                        <h3 class="text-xl font-semibold mb-4">{{ $lesson->title }}</h3>--}}
{{--                        <div class="text-gray-600 mb-4">Дата проведение: {{ $lesson->date }}</div>--}}
{{--                        <div class="flex items-center mb-4">--}}
{{--                            <img src="{{ asset('storage/' . $lesson->specialist->photo) }}" alt="Lecturer" class="w-16 h-15 rounded-full mr-4">--}}
{{--                            <div>--}}
{{--                                <h4>Специалист:</h4>--}}
{{--                                <p class="text-sky-700 hover:text-sky-400">{{ $lesson->specialist->name }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mb-4">--}}
{{--                        <div class="flex flex-wrap">--}}
{{--                            @php--}}
{{--                                $students = $lesson->students->count();--}}
{{--                                $capacity = $lesson->capacity;--}}
{{--                                $placed = [];--}}
{{--                                for ($i = 1; $i <= $capacity; $i++) {--}}
{{--                                    $place = new stdClass();--}}
{{--                                    $place->number = $i;--}}
{{--                                    $place->status = ($i <= $students) ? "reserved" : "available";--}}
{{--                                    $placed[] = $place;--}}
{{--                                }--}}
{{--                            @endphp--}}

{{--                            @foreach ($placed as $seat)--}}
{{--                                <div class="relative seat {{ $seat->status === 'reserved' ? 'seat-reserved' : 'seat-available' }}">{{ $seat->number }}--}}
{{--                                    @if($seat->status == 'reserved')--}}
{{--                                        <svg class="h-6 w-6 text-red-500 absolute top-50 right-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                            <path stroke="none" d="M0 0h24v24H0z"/>--}}
{{--                                            <line x1="18" y1="6" x2="6" y2="18"/>--}}
{{--                                            <line x1="6" y1="6" x2="18" y2="18"/>--}}
{{--                                        </svg>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="flex justify-between mb-4">--}}
{{--                            <div class="flex items-center text-green-400">--}}
{{--                                <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                    <path stroke="none" d="M0 0h24v24H0z"/>--}}
{{--                                    <line x1="5" y1="12" x2="19" y2="12"/>--}}
{{--                                    <line x1="5" y1="12" x2="9" y2="16"/>--}}
{{--                                    <line x1="5" y1="12" x2="9" y2="8"/>--}}
{{--                                </svg>--}}
{{--                                <span class="ml-2">{{ $lesson->students->count() }} Заполнено</span>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center text-cyan-500">--}}
{{--                                <span class="mr-2">{{ $lesson->capacity - $lesson->students->count() }} Доступно</span>--}}
{{--                                <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                    <path stroke="none" d="M0 0h24v24H0z"/>--}}
{{--                                    <line x1="5" y1="12" x2="19" y2="12"/>--}}
{{--                                    <line x1="15" y1="16" x2="19" y2="12"/>--}}
{{--                                    <line x1="15" y1="8" x2="19" y2="12"/>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-center w-full">--}}
{{--                            @auth--}}
{{--                                @php--}}
{{--                                    $isRegistered = DB::table('lesson_users')--}}
{{--                                        ->where('lesson_id', $lesson->id)--}}
{{--                                        ->where('user_id', Auth::id())--}}
{{--                                        ->exists();--}}
{{--                                @endphp--}}

{{--                                @if ($isRegistered)--}}
{{--                                    <div class="p-4 bg-gray shadow-lg rounded-lg">--}}
{{--                                        <p class="text-xl font-semibold text-center text-green-600">--}}
{{--                                            Вы записаны--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <form action="{{ route('lessons.register', $lesson->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded">Записаться на урок</button>--}}
{{--                                    </form>--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <p class="text-xl font-semibold text-center text-red-400">Пожалуйста, <a href="{{ route('login') }}" class="underline">войдите</a> для записи на урок.</p>--}}
{{--                            @endauth--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <!-- Пагинация -->--}}
{{--        <div class="mt-4">--}}
{{--            {{ $lessons->links('vendor.pagination.custom') }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Banner Section -->
<div class="relative max-w-full h-64 mt-4 md:h-96 bg-cover bg-center  bg-small bg-medium bg-large" >
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 md:px-8">
{{--        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-4">Welcome to Our Website</h1>--}}
{{--        <p class="text-lg md:text-xl lg:text-2xl text-white">Explore our services and offerings to find the best solutions for your needs.</p>--}}
    </div>
</div>


@endsection
