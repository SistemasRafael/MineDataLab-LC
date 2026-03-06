<?php

namespace App\Services\Usuarios;

use App\Models\Usuarios;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UsuariosService {

    public function getAll() : LengthAwarePaginator {
        $query = Usuarios::latest('id')->get();
        return $query->paginate(Usuarios::PAGINATE);
    }

    public function create(array $usuario) : Usuarios {
        return Usuarios::create($usuario);
    }
}