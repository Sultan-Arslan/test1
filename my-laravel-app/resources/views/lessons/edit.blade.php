@php
    $specialists = \App\Models\User::role('specialist')->get();
@endphp

@extends('layouts.app')

@section('title', 'Edit Lesson')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-10 py-4 px-8 rounded-lg shadow-lg">{{__('main.Edit Lesson')}}</h1>
        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">{{__('main.Title')}}</label>
                <input type="text" name="title" class="form-input mt-1 block w-full" value="{{ $lesson->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">{{__('main.Description')}}</label>
                <textarea name="description" class="form-textarea mt-1 block w-full">{{ $lesson->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-gray-700">{{__('main.date')}}</label>
                <input type="date" name="date" class="form-input mt-1 block w-full" value="{{ $lesson->date }}" required>
            </div>
            <div class="mb-4">
                <label for="specialist_id" class="block text-gray-700">{{__('main.Specialist')}}</label>
                <select name="specialist_id" class="form-select mt-1 block w-full" required>
                    @foreach($specialists as $specialist)
                        <option value="{{ $specialist->id }}">{{ $specialist->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-4">
                <label for="capacity" class="block text-gray-700">{{__('main.capacity')}}</label>
                <input type="number" name="capacity" class="form-input mt-1 block w-full" value="{{ $lesson->capacity }}" required>
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 mt-4 rounded">{{__('main.update')}}</button>
        </form>
        <div class="mt-4 ">
            <a href="{{ route('lessons.index') }}" class="bg-blue-500  text-white px-4 py-2 mt-4 rounded">{{__('main.back')}}</a>
        </div>
    </div>
@endsection
