<x-LayoutPublic>
    @if(session('message-error'))
        <div class="alert alert-danger">
            {{ session('message-error') }}
        </div>
    @endif
    <form action="{{ route('auth.signin') }}" method="POST">
        @csrf

        <input type="text" name="codigo" placeholder="Código">
        <input type="password" name="clave" placeholder="Clave">

        <button type="submit">Iniciar sesión</button>
    </form>
</x-LayoutPublic>