<x-LayoutAuth>
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <div class="flex justify-center">
            <img
                src="{{ asset('assets/minedata_lab.jpg') }}"
                alt="Logo de la empresa"
                class="h-20 w-auto">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Iniciar sesión
        </h2>
        <form action="{{ route('auth.signin') }}" method="POST" class="space-y-5">
            @csrf
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label class="block text-sm font-medium text-gray-700">Código</label>
                <input
                    type="input"
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    maxlength="200"
                    name="codigo"/>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Clave</label>
                <input
                    type="password"
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    maxlength="200"
                    name="clave" />
            </div>
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="rounded border-gray-300">
                    Recuérdame
                </label>
                <a href="#" class="text-indigo-600 hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>
            <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition font-semibold">
                Entrar
            </button>
        </form>
        <p class="mt-6 text-center text-sm text-gray-600">
            ¿No tienes una cuenta?
            <a href="#" class="text-indigo-600 font-medium hover:underline">
                Regístrate
            </a>
        </p>
    </div>
</x-LayoutAuth>