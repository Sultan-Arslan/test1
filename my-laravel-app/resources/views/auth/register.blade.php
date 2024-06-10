<x-guest-layout>
    <!-- Подключение Alpine.js с отложенной загрузкой -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
    <!-- Подключение Inputmask -->
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/inputmask.min.js"></script>


    <!-- Инициализация компонента Alpine.js и маски ввода -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('phoneInputMask', () => ({
                init() {
                    // Создание и применение маски ввода
                    const phoneMask = new Inputmask('+7-999-999-9999');
                    phoneMask.mask(this.$refs.phone);
                }
            }));
        });
    </script>

    <x-slot name="header">
        {{__('main.register')}}
    </x-slot>
    <form method="POST" action="{{ route('register') }} " x-data="phoneInputMask()">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('main.name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('main.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone tel -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('main.phone_number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                          autocomplete="phone" placeholder="+7-123-456-7890" pattern="[+]{1}[7]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" x-ref="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>




        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('main.password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('main.confirm_password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('main.Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('main.register') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
