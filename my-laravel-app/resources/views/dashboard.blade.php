<x-app-layout>
    <h1 class="text-4xl md:text-5xl lg:text-6xl fw-bold text-center text-white bg-gradient-to-r from-blue-500 to-purple-500 mb-4 py-4 px-8 rounded-lg shadow-lg">
        {{ __('main.lessons') }}
    </h1>

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Уроки</h1>
        <a href="" class="bg-blue-500 text-white px-4 py-2 rounded">Создать урок</a>
        <table class="min-w-full bg-white mt-4">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Название</th>
                <th class="py-2 px-4 border-b">Описание</th>
                <th class="py-2 px-4 border-b">Действия</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b"></td>
                    <td class="py-2 px-4 border-b"></td>
                    <td class="py-2 px-4 border-b"></td>
                    <td class="py-2 px-4 border-b">
                        <a href="" class="bg-yellow-500 text-white px-4 py-2 rounded">Редактировать</a>
                        <form action="" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Удалить</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</x-app-layout>
