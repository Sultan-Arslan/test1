<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold mb-6 text-center">Уроки </h1>
        <a href="{{route('add-lesson')}}" class="bg-blue-500 text-white px-4 py-2 mb-10 rounded-lg hover:bg-blue-700">Создать</a>
    </x-slot>

    <div class="container mx-auto">
        <br>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Product Card Start -->

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://www.usports.ru/sites/usp/files/collections/0/742/istock_517098364_1080.jpg" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2"> Title </h2>
                    <p class="text-gray-600 mb-4">This is a short description of the lesson.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-800">20.05.2024 г.</span>
                        <span class="text-lg font-bold text-gray-800">Даурен Тайыров</span>
                    </div>
                    <div class="flex justify-start gap-2 items-center">
                        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">Редактировать</a>
                        <a href="#" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
