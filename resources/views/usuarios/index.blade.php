<x-layout>
    <div class="d-flex justify-content-end mt-3">
        {{ $usuarios->links() }}
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>