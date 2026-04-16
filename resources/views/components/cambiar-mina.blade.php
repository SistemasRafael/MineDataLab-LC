
<li
    x-data="{
        open: false,
        ...argEmprUnidades({
            minaSeleccionada: @js($minaSeleccionada),
            minas: @js($minas)
        })
    }"
    class="relative">
    <button
        @click="open = !open"
        class="flex items-center justify-between w-full py-2 px-3 font-medium text-heading border-b border-light md:w-auto hover:bg-neutral-secondary-soft md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">
        <span x-text="minaSeleccionada['nombre'] ?? 'Cambiar de mina'"></span>
        <svg class="w-4 h-4 ms-1.5 transition-transform"
            :class="open ? 'rotate-180' : ''"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7"/>
        </svg>
    </button>
    <div
        x-show="open"
        x-transition
        @click.outside="open = false"
        class="absolute z-10 mt-2 w-48 text-sm bg-neutral-primary-soft border border-default rounded-base shadow">
        <ul class="p-4 space-y-3">
            <template x-for="(nombre, id) in minas" :key="id">
                <li>
                    <a
                        href="#"
                        class="block text-body hover:text-fg-brand"
                        @click.prevent="
                            cambiarMina({
                                id: id,
                                nombre: nombre
                            });
                            open = false
                        "
                        x-text="nombre"
                    ></a>
                </li>
            </template>
        </ul>
    </div>
</li>
