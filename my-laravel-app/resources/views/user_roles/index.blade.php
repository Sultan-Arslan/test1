@extends('layouts.app')

@section('title', 'Manage User Roles')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-10 py-4 px-8 rounded-lg shadow-lg">Manage User Roles</h1>
        <div class="mt-4 mb-4 ">
            <a href="{{ route('lessons.index') }}" class="bg-blue-500  text-white px-4 py-2 mt-4 rounded">{{__('main.back')}}</a>
        </div>
        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Roles</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">
                        @foreach($user->roles as $role)
                            <span class="bg-gray-200 rounded-full px-2 py-1 text-sm">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('user_roles.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="roles[]"  class="form-select mt-1 block w-full">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded mt-2">Update Roles</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4 ">
            <a href="{{ route('lessons.index') }}" class="bg-blue-500  text-white px-4 py-2 mt-4 rounded">{{__('main.back')}}</a>
        </div>
    </div>
@endsection
