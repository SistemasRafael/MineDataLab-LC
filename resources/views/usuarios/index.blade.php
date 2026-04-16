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
        <div class="hidden rounded-base bg-neutral-secondary-soft" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="mx-auto bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <div class="flex justify-end mt-4">
                        {{ $usuarios->links('pagination::tailwind') }}
                    </div>
                    <table class="min-w-full text-sm text-left text-gray-600 mt-4">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3">Usuario</th>
                                <th class="px-6 py-3">Nombre</th>
                                <th class="px-6 py-3">Correo</th>
                                <th class="px-6 py-3">Activo</th>
                                <th class="px-6 py-3">Fecha Creacion</th>
                                <th class="px-6 py-3">Usuario Creador</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($usuarios as $usuario)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $usuario->codigo }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-800">{{ $usuario->nombre }}</td>
                                    <td class="px-6 py-4">{{ $usuario->email }}</td>
                                    <td class="px-6 py-4">
                                        {!! 
                                            $usuario->activo
                                                ? '<span class="bg-success-soft text-fg-success-strong text-xs font-medium px-1.5 py-0.5 rounded">Sí</span>' 
                                                : '<span class="bg-danger-soft text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded">No</span>' 
                                        !!}
                                    </td>
                                    <td class="px-6 py-4">{{ $usuario->fecha_creacion?->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4">{{ $usuario->user_created }}</td>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="flex justify-end mt-4">
                        {{ $usuarios->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden p-4 rounded-base bg-neutral-secondary-soft" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <p class="text-sm text-body"><strong class="font-medium text-heading">Coming Soon</strong></p>
        </div>
    </div>
</x-layout-private>