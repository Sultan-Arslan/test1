@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-10 py-4 px-8 rounded-lg shadow-lg">{{__('main.lessons')}}</h1>
        <div class="flex gap-5">
            <a href="{{ route('lessons.create') }}" class="bg-green-500  text-white px-4 py-2 mt-4 rounded mb-4">{{__('main.Create Lesson')}}</a>
            <a href="{{ route('user_roles.index') }}" class="bg-orange-500  text-white px-4 py-2 mt-4 rounded mb-4">{{__('main.Specialist')}}</a>
        </div>
    <div class="container mx-auto">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Панель управления</h1>
            @if($lessons->isEmpty())
                <p>Нет доступных уроков.</p>
            @else
                <table class="min-w-full bg-white mt-4">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Название</th>
                        <th class="py-2 px-4 border-b">Описание</th>
                        <th class="py-2 px-4 border-b">Дата проведения</th>
                        <th class="py-2 px-4 border-b">Специалист</th>
                        <th class="py-2 px-4 border-b">Места</th>
                        <th class="py-2 px-4 border-b">Куплено</th>
                        <th class="py-2 px-4 border-b">Осталось мест</th>
                        <th class="py-2 px-4 border-b">Действия</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($lessons as $lesson)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $lesson->id }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-info">{{ $lesson->title }}</a>
                            </td>
                            <td class="py-2 px-4 border-b text-clip">{{ $lesson->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $lesson->date }}</td>
                            <td class="py-2 px-4 border-b">{{ $lesson->specialist->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $lesson->capacity }}</td>
                            <td class="py-2 px-4 border-b">{{ $lesson->students->count() }}</td>
                            <td class="py-2 px-4 border-b">{{ $lesson->capacity-$lesson->students->count() }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('lessons.edit', $lesson->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded mb-2">Редактировать</a>
                                <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 max-w-full text-white  px-4 py-2 rounded mt-2 mb-2">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
@endsection
