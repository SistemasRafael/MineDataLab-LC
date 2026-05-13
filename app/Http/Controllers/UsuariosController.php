<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Usuarios\CreateUsuariosRequest;
use App\Services\Usuarios\UsuariosService;

class UsuariosController extends Controller
{
    public function __construct(protected UsuariosService $usuariosService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        

        $search = $request->input('search');
        $filters = request('filters');
        $filtersArray = $filters ? explode(',', $filters) : [];

        
$filtros = [
            [
                'label' => 'Usuario',
                'Type' => 'string',
            ],
            [
                'label' => 'Nombre',
                'Type' => 'string',
            ],
            [
                'label' => 'Correo',
                'Type' => 'string',
            ],
            [
                'label' => 'Tipo',
                'Type' => 'string',
            ],
            [
                'label' => 'Estatus',
                'Type' => 'string',
            ],
            [
                'label' => 'Creador',
                'Type' => 'string',
            ],
            [
                'label' => 'Creacion',
                'Type' => 'date',
            ],
        ];

        $usuarios = $this->usuariosService->getAllUsersDetalles($search, $filtersArray);

        return view('usuarios.index', compact('usuarios', 'filtros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUsuariosRequest $request)
    {
        $this->usuariosService->create($request->validated());

        return Redirect()
               ->route('Usuarios.index')
               ->with('message', 'Usuario creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
