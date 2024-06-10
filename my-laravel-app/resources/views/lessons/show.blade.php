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
        <a href="{{ route('lessons.index') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Back</a>
    </div>
@endsection
