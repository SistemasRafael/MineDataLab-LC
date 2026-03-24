<?php

namespace App\DTO;

use App\Http\Requests\Auth\SignInAuthRequest;

class ArgUsuariosDTO
{
    public int $u_id;
    public int $unidad_def;
    public int $unidad_acc;
    public string $codigo;
    public string $nombre;
    public string $email;
    public string $unidades;

    public function __construct(int $u_id, 
                                string $codigo, 
                                string $nombre, 
                                string $email, 
                                string $unidades, 
                                int $unidad_def, 
                                int $unidad_acc)
    {
        $this->u_id = $u_id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->unidades = $unidades;
        $this->unidad_def = $unidad_def;
        $this->unidad_acc = $unidad_acc;
    }

    public static function fromModel($data): self
    {
        return new self(
            $data->u_id,
            $data->codigo,
            $data->nombre,
            $data->email,
            $data->unidades,
            $data->unidad_def,
            $data->unidad_acc
        );
    }
}
