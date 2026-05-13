<x-layout-private :userName="session('usuario.nombre')">
    <div class="mb-4 border-b border-default">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple hover:text-purple border-purple" data-tabs-inactive-classes="dark:border-transparent text-body hover:text-fg-brand border-default hover:border-brand" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-base" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Usuarios</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-base hover:text-fg-brand hover:border-brand" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Perfiles</button>
            </li>
        </ul>
    </div>
    <div id="default-styled-tab-content">
        <div class="hidden rounded-base" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="flex justify-end mt-4">
                {{ $usuarios->withQueryString()->links('pagination::tailwind') }}
            </div>
            <div class="mx-auto bg-white rounded-xl shadow-md overflow-hidden mt-4">
                <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                    <form method="GET" action="{{ route('usuarios.index') }}">
                        <div class="p-4">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                                </div>
                                <input 
                                    type="text" 
                                    name="search" 
                                    id="search"
                                    value="{{ request('search') }}"
                                    class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body" 
                                    placeholder="Search">
                            </div>
                        </div>
                    </form>
                    <table class="min-w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3">Usuario</th>
                                <th class="px-6 py-3">
                                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownDotsHorizontal" class="flex items-center justify-between w-full py-2 px-3 text-body rounded hover:bg-neutral-tertiary-medium md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:w-auto md:dark:hover:bg-transparent">
                                    NOMBRE 
                                    <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                                    </button>
                                    <div id="dropdownDotsHorizontal" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44 dark:divide-gray-600">
                                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <input 
                                                type="text" 
                                                id="first_name" 
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"/>
                                        </li>
                                        </ul>
                                        <div class="p-2 text-sm text-body font-medium border-t border-default">
                                            {{-- <button type="button" class="w-full text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"/></svg>
                                                Filtrar
                                            </button> --}}
                                            <button type="button" class="w-full inline-flex items-center justify-center text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">
                                                <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"/></svg>
                                                Filtrar
                                            </button>
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3">Correo</th>
                                <th class="px-6 py-3">Tipo</th>
                                <th class="px-6 py-3">Estatus</th>
                                <th class="px-6 py-3">Creador</th>
                                <th class="px-6 py-3">Creacion</th>
                                <th class="px-6 py-3">Perfiles Asignados</th>
                                <th class="px-6 py-3">Estado Usuario</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($usuarios as $usuario)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $usuario->codigo }}</td>
                                    <td class="px-6 py-4">{{ $usuario->nombre }}</td>
                                    <td class="px-6 py-4">{{ $usuario->email }}</td>
                                    <td class="px-6 py-4">{{ $usuario->tipo_usuario }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            {!! 
                                                $usuario->activo
                                                    ? '<div class="h-2.5 w-2.5 rounded-full bg-success me-2"></div> Activo' 
                                                    : '<div class="h-2.5 w-2.5 rounded-full bg-danger me-2"></div> Inactivo' 
                                            !!}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">{{ $usuario->user_created }}</td>
                                    <td class="px-6 py-4">{{ $usuario->fecha_creacion?->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4">
                                        <button type="button" class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 box-border border border-transparent shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40">Editar</button>
                                    </td>
                                    <td class="px-6 py-4">
                                        {!! 
                                            $usuario->activo
                                                ? '<button type="button" class="text-danger bg-neutral-primary border border-danger hover:bg-danger hover:text-white focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-xs px-3 py-1.5 focus:outline-none">Desactivar</button>' 
                                                : '<button type="button" class="text-success bg-neutral-primary border border-success hover:bg-success hover:text-white focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-xs px-3 py-1.5 focus:outline-none">Activar</button>' 
                                        !!}
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                {{ $usuarios->links('pagination::tailwind') }}
            </div>
        </div>
        <div class="hidden p-4 rounded-base" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <p class="text-sm text-body"><strong class="font-medium text-heading">Coming Soon</strong></p>
        </div>
    </div>
</x-layout-private>