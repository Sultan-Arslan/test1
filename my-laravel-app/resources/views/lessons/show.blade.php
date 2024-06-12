@extends('layouts.app')

@section('title', 'Lesson Details')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Lesson Details</h1>
        <div class="mb-4">
            <strong>Title:</strong> {{ $lesson->title }}
        </div>
        <div class="mb-4">
            <strong>Description:</strong> {{ $lesson->description }}
        </div>
        <div class="mb-4">
            <strong>Date:</strong> {{ $lesson->date }}
        </div>
        <div class="mb-4">
            <strong>Specialist:</strong> {{ $lesson->specialist->name }}
        </div>
        <div class="mb-4">
            <strong>Capacity:</strong> {{ $lesson->capacity }}
        </div>

        <h2 class="text-xl font-bold mb-4">Students</h2>
        <table class="table-auto w-full mb-4">
            <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                @if ($isAdmin)
                    <th class="px-4 py-2">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @for ($i = 1; $i <= $lesson->capacity; $i++)
                @php
                    $student = $students->get($i - 1);
                @endphp
                <tr>
                    <td class="border px-4 py-2">{{ $i }}</td>
                    <td class="border px-4 py-2">
                        @if ($student)
                            {{ $student->name }}
                        @else
                            @if ($isAdmin)
                                <form action="{{ route('lessons.registerAdmin', $lesson->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Reserve</button>
                                </form>
                            @else
                                Free
                            @endif
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        @if ($student)
                            {{ $student->email }}
                        @else
                            -
                        @endif
                    </td>
                    @if ($isAdmin && $student)
                        <td class="border px-4 py-2">
                            <form action="{{ route('lessons.unregister', ['lesson' => $lesson->id, 'user' => $student->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endfor
            </tbody>
        </table>

        <a href="{{ route('lessons.index') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Back</a>
    </div>
@endsection
