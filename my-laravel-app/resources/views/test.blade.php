<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .seat {
            width: 40px;
            height: 40px;
            margin: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            font-weight: bold;
            color: white;
        }
        .seat-available {
            background-color: green;
        }
        .seat-reserved {
            background-color: yellow;
            color: black;
        }
        .seat-occupied {
            background-color: red;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-8">Lesson Cards</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="text-xl font-semibold mb-4">Introduction to HTML</div>
            <div class="text-gray-600 mb-4">Date: 2024-06-01</div>
            <div class="flex items-center mb-4">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?crop=faces&fit=crop&w=80&h=80" alt="Lecturer" class="w-12 h-12 rounded-full mr-4">
                <span>John Doe</span>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    <div class="seat seat-occupied">1</div>
                    <div class="seat seat-occupied">2</div>
                    <div class="seat seat-occupied">3</div>
                    <div class="seat seat-occupied">4</div>
                    <div class="seat seat-occupied">5</div>
                    <div class="seat seat-occupied">6</div>
                    <div class="seat seat-reserved">7</div>
                    <div class="seat seat-reserved">8</div>
                    <div class="seat seat-reserved">9</div>
                    <div class="seat seat-available">10</div>
                    <div class="seat seat-available">11</div>
                    <div class="seat seat-available">12</div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center text-green-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">3 available</span>
                </div>
                <div class="flex items-center text-yellow-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">3 reserved</span>
                </div>
                <div class="flex items-center text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 01-2 2H7a2 2 0 01-2-2h14zm0 0a2 2 0 00-2-2H7a2 2 0 00-2 2h14z"></path></svg>
                    <span class="ml-2">6 occupied</span>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="text-xl font-semibold mb-4">CSS Basics</div>
            <div class="text-gray-600 mb-4">Date: 2024-06-05</div>
            <div class="flex items-center mb-4">
                <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?crop=faces&fit=crop&w=80&h=80" alt="Lecturer" class="w-12 h-12 rounded-full mr-4">
                <span>Jane Smith</span>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    <div class="seat seat-occupied">1</div>
                    <div class="seat seat-occupied">2</div>
                    <div class="seat seat-occupied">3</div>
                    <div class="seat seat-reserved">4</div>
                    <div class="seat seat-reserved">5</div>
                    <div class="seat seat-available">6</div>
                    <div class="seat seat-available">7</div>
                    <div class="seat seat-available">8</div>
                    <div class="seat seat-available">9</div>
                    <div class="seat seat-available">10</div>
                    <div class="seat seat-available">11</div>
                    <div class="seat seat-available">12</div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center text-green-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">7 available</span>
                </div>
                <div class="flex items-center text-yellow-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">2 reserved</span>
                </div>
                <div class="flex items-center text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 01-2 2H7a2 2 0 01-2-2h14zm0 0a2 2 0 00-2-2H7a2 2 0 00-2 2h14z"></path></svg>
                    <span class="ml-2">3 occupied</span>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="text-xl font-semibold mb-4">JavaScript Fundamentals</div>
            <div class="text-gray-600 mb-4">Date: 2024-06-10</div>
            <div class="flex items-center mb-4">
                <img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?crop=faces&fit=crop&w=80&h=80" alt="Lecturer" class="w-12 h-12 rounded-full mr-4">
                <span>Michael Brown</span>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    <div class="seat seat-occupied">1</div>
                    <div class="seat seat-occupied">2</div>
                    <div class="seat seat-reserved">3</div>
                    <div class="seat seat-reserved">4</div>
                    <div class="seat seat-available">5</div>
                    <div class="seat seat-available">6</div>
                    <div class="seat seat-available">7</div>
                    <div class="seat seat-available">8</div>
                    <div class="seat seat-available">9</div>
                    <div class="seat seat-available">10</div>
                    <div class="seat seat-available">11</div>
                    <div class="seat seat-available">12</div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center text-green-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">8 available</span>
                </div>
                <div class="flex items-center text-yellow-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">2 reserved</span>
                </div>
                <div class="flex items-center text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 01-2 2H7a2 2 0 01-2-2h14zm0 0a2 2 0 00-2-2H7a2 2 0 00-2 2h14z"></path></svg>
                    <span class="ml-2">2 occupied</span>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="text-xl font-semibold mb-4">Advanced CSS Techniques</div>
            <div class="text-gray-600 mb-4">Date: 2024-06-15</div>
            <div class="flex items-center mb-4">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?crop=faces&fit=crop&w=80&h=80" alt="Lecturer" class="w-12 h-12 rounded-full mr-4">
                <span>Sarah Lee</span>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    <div class="seat seat-occupied">1</div>
                    <div class="seat seat-occupied">2</div>
                    <div class="seat seat-reserved">3</div>
                    <div class="seat seat-reserved">4</div>
                    <div class="seat seat-reserved">5</div>
                    <div class="seat seat-available">6</div>
                    <div class="seat seat-available">7</div>
                    <div class="seat seat-available">8</div>
                    <div class="seat seat-available">9</div>
                    <div class="seat seat-available">10</div>
                    <div class="seat seat-available">11</div>
                    <div class="seat seat-available">12</div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center text-green-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">7 available</span>
                </div>
                <div class="flex items-center text-yellow-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">3 reserved</span>
                </div>
                <div class="flex items-center text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 01-2 2H7a2 2 0 01-2-2h14zm0 0a2 2 0 00-2-2H7a2 2 0 00-2 2h14z"></path></svg>
                    <span class="ml-2">2 occupied</span>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="text-xl font-semibold mb-4">Responsive Web Design</div>
            <div class="text-gray-600 mb-4">Date: 2024-06-20</div>
            <div class="flex items-center mb-4">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?crop=faces&fit=crop&w=80&h=80" alt="Lecturer" class="w-12 h-12 rounded-full mr-4">
                <span>David White</span>
            </div>
            <div class="mb-4">
                <div class="flex flex-wrap">
                    <div class="seat seat-occupied">1</div>
                    <div class="seat seat-occupied">2</div>
                    <div class="seat seat-occupied">3</div>
                    <div class="seat seat-occupied">4</div>
                    <div class="seat seat-occupied">5</div>
                    <div class="seat seat-occupied">6</div>
                    <div class="seat seat-reserved">7</div>
                    <div class="seat seat-reserved">8</div>
                    <div class="seat seat-available">9</div>
                    <div class="seat seat-available">10</div>
                    <div class="seat seat-available">11</div>
                    <div class="seat seat-available">12</div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center text-green-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">4 available</span>
                </div>
                <div class="flex items-center text-yellow-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M12 7l-5 5 5 5"></path></svg>
                    <span class="ml-2">2 reserved</span>
                </div>
                <div class="flex items-center text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 01-2 2H7a2 2 0 01-2-2h14zm0 0a2 2 0 00-2-2H7a2 2 0 00-2 2h14z"></path></svg>
                    <span class="ml-2">6 occupied</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
