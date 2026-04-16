<?php

namespace App\DTO;

use Carbon\Carbon;
use App\helpers\Helpers;

class ArgUsuariosDTO
{
    public function __construct(
            public int $u_id,
            public string $codigo,
            public string $nombre,
            public string $email,
            public ?Carbon $fecha_creacion,
            public ?Carbon $fecha_fin,
            public ?string $user_created,
            public ?string $activo,
            public ?string $tipo_usuario,
            public ?int $unidad_def,
            public ?int $unidad_acc
        ) {}

    public static function fromModel(object $row): self
    {
        return new self(
            $row->u_id,
            $row->codigo,
            $row->nombre,
            $row->email,
            helpers::parseDate($row->fecha_creacion),
            helpers::parseDate($row->fecha_fin),
            $row->user_created,
            $row->activo,
            $row->tipo_usuario,
            $row->unidad_def,
            $row->unidad_acc
        );
    }
}
