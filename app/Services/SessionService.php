<?php

namespace App\Services;

class SessionService
{
    public function createUserSession($user): void
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

    public function createUserDirectivesSession($directivas): void
    {
        session([
            'usuario_directivas' => [
                'unidad_def' => $directivas->unidad_def ?? null,
                'unidad_acc' => $directivas->unidad_acc ?? null,
                'unidades'    => $directivas->unidades ?? null
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