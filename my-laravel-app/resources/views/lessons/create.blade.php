@php
    $specialists = \App\Models\User::role('specialist')->get();
@endphp

@extends('layouts.app')

@section('title', 'Create Lesson')

@section('content')
    <div class="container mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-10 py-4 px-8 rounded-lg shadow-lg">{{__('main.Create Lesson')}}</h1>
        <form action="{{ route('lessons.store') }}" method="POST">
            @csrf
            <div class="mb-4 bg-white rounded-lg shadow-md p-6">
                <label for="title" class="block text-gray-700">{{__('main.Title')}}</label>
                <input type="text" name="title" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4 bg-white rounded-lg shadow-md p-6">
                <label for="description" class="block text-gray-700">{{__('main.Description')}}</label>
                <textarea name="description" class="form-textarea mt-1 block w-full"></textarea>
            </div>
            <div class="mb-4 bg-white rounded-lg shadow-md p-6">
                <label for="date" class="block text-gray-700">{{__('main.date')}}</label>
                <input type="date" name="date" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4 bg-white rounded-lg shadow-md p-6">
                <label for="specialist_id" class="block text-gray-700">{{__('main.Specialist')}}</label>
                <select name="specialist_id" class="form-select mt-1 block w-full" required>
                    @foreach($specialists as $specialist)
                        <option value="{{ $specialist->id }}">{{ $specialist->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4 bg-white rounded-lg shadow-md p-6">
                <label for="capacity" class="block text-gray-700">{{__('main.capacity')}}</label>
                <input type="number" name="capacity" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">{{__('main.create')}}</button>
        </form>
        <div class="mt-4 ">
            <a href="{{ route('lessons.index') }}" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">{{__('main.back')}}</a>
        </div>
    </div>
@endsection
