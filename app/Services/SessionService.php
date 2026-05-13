<?php

namespace App\Services;

use App\DTO\ArgUsuariosDTO;
use App\Models\arg_usuarios as Usuarios;

class SessionService
{
    public function createUserSession(?Usuarios $user): void
    {
        session([
            'usuario' => [
                'id' => $user->id ?? $user->u_id ?? null,
                'codigo' => $user->codigo ?? null,
                'nombre' => $user->nombre ?? null,
                'email' => $user->email ?? null
            ]
        ]);
    }

    public function createUserDirectivesSession(?ArgUsuariosDTO $directivas): void
    {
        session([
            'usuario_directivas' => [
                'unidad_def' => $directivas->unidad_def ?? 0,
                'unidad_acc' => $directivas->unidad_acc ?? 0,
                'unidades'    => $directivas->unidades ?? 0
            ]
        ]);
    }

    public function destroySession(): void
    {
        session()->flush();
    }

    public function getUnidadAcc(): int
    {
        return session('usuario_directivas.unidad_acc');
    }
}