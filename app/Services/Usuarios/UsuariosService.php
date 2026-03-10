<?php

namespace App\Services\Usuarios;

use App\Models\arg_usuarios as Usuarios;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UsuariosService {

    public function getAll() : LengthAwarePaginator {
        
        return Usuarios::latest('id')
                        ->paginate(Usuarios::PAGINATE);
    }

    public function create(array $usuario) : Usuarios {
        return Usuarios::create($usuario);
    }
}