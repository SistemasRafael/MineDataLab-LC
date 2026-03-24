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
    public function index()
    {
        $usuarios = $this->usuariosService->getAll();
        
        return view('usuarios.index', compact('usuarios'));
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
