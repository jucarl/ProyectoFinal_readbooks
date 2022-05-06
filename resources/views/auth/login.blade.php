<x-guest-layout>
 <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-100 underline">Dashboard</a>
                    <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-100 underline">Cerrar Sesion</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-100 underline">Ingresar</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-100 underline">Registro</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                            <img
                            aria-hidden="true"
                            class="object-cover w-full h-full dark:hidden"
                            src="https://i.pinimg.com/564x/d1/36/e9/d136e91be28dc4836a7c6733517d74b6.jpg"
                            alt="Office"
                            />
                            <img
                            aria-hidden="true"
                            class="hidden object-cover w-full h-full dark:block"
                            src="https://i.pinimg.com/564x/d1/36/e9/d136e91be28dc4836a7c6733517d74b6.jpg"
                            alt="Office"
                            />
                    </div>

                    {{--DIV CAMPOS LOGIN--}}

                        <x-jet-authentication-card class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                            <x-slot name="logo">
                                <x-jet-authentication-card-logo />
                            </x-slot>

                            <x-jet-validation-errors class="mb-4" />

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div>
                                    <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif

                                    <x-jet-button class="ml-4">
                                        {{ __('Ingresar') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </x-jet-authentication-card>

                </div>
            </div>
        </div>
 </div>
</x-guest-layout>
