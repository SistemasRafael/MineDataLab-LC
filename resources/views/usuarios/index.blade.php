<x-layout>
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
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Showing {{ $usuarios->firstItem() }} to {{ $usuarios->lastItem() }} of {{ $usuarios->total() }} results
        </div>

        {{ $usuarios->links() }}
    </div>
    
</x-layout>