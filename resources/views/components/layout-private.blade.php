<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
 <body>
    
<body class="min-h-screen flex flex-col bg-gray-100 text-gray-800">
    <header class="bg-indigo-600 text-white">
        <nav class="bg-neutral-primary border-default">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
                <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/minedata_lab.jpg') }}" class="h-7" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-heading">MineData Labs</span>
                </a>
                <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                        <li>
                            <button 
                                id="mega-menu-dropdown-button-user" 
                                data-dropdown-toggle="mega-menu-dropdown-user" 
                                class="flex items-center justify-between w-full py-2 px-3 font-medium text-heading border-b border-light md:w-auto hover:bg-neutral-secondary-soft md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">
                                {{ $userName }} 
                                <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                            </button>
                            <div 
                                id="mega-menu-dropdown-user" 
                                class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-neutral-primary-soft border border-default rounded-base shadow md:grid-cols-3">
                                <div class="p-4 pb-0 text-heading md:pb-4">
                                    <ul class="space-y-3" aria-labelledby="mega-menu-dropdown-button">
                                        <li>
                                            <li><a class="text-body hover:text-fg-brand" href="{{ route('auth.logout') }}">Cerrar sesión</a></li>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                        <x-CambiarMina 
                            :minaSeleccionada="$minaSeleccionada" 
                            :minas="$minas">
                        </x-CambiarMina>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-1 mx-auto w-full px-4 py-6">
        {{ $slot }}
    </main>
    <footer class="bg-gray-800 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center text-sm">
            © 2026 Mi Aplicación. Todos los derechos reservados.
        </div>
    </footer>
    <x-loading text="Procesando…"></x-loading>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    <script>
        window.routes = {
            cambiarMina: "{{ route('mina.cambiar') }}"
        };
    </script>
</body>
</html>