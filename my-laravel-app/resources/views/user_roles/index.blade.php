@extends('layouts.app')

@section('title', 'Manage User Roles')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-10 py-4 px-8 rounded-lg shadow-lg">Manage User Roles</h1>
        <div class="mt-4 mb-4">
            <a href="{{ route('lessons.index') }}" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">{{__('main.back')}}</a>
        </div>
        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Форма фильтрации и поиска -->
        <form action="{{ route('user_roles.index') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <div class="mr-2">
                    <label for="role" class="block text-sm font-medium text-gray-700">Фильтр по роли</label>
                    <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Все роли</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ request('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mr-2">
                    <label for="username" class="block text-sm font-medium text-gray-700">Поиск по имени пользователя</label>
                    <input type="text" name="username" id="username" value="{{ request('username') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mr-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Поиск по электронной почте</label>
                    <input type="text" name="email" id="email" value="{{ request('email') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mt-6">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Искать
                    </button>
                </div>
            </div>
        </form>

        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Photo</th>
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
                        @if($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" class="w-16 h-16 rounded-full">
                            <form action="{{ route('user_roles.deletePhoto', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded mt-1">Delete</button>
                            </form>
                        @else
                            <span>No photo</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        @foreach($user->roles as $role)
                            <span class="bg-gray-200 rounded-full px-2 py-1 text-sm">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('user_roles.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <select name="roles[]" class="form-select mt-1 block w-full" >
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="file" name="photo" class="form-control mt-2">
                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded mt-2">Update Roles</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Пагинация -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>

        <div class="mt-4">
            <a href="{{ route('lessons.index') }}" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">{{__('main.back')}}</a>
        </div>
    </div>
@endsection
