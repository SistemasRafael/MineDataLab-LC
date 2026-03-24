<?php

namespace App\Services;

use App\Models\arg_empr_unidades;
use Illuminate\Database\Eloquent\Collection;

class ArgEmprUnidadesService {

    public function getAll() : Collection 
    {
        return arg_empr_unidades::all();
    }

    public function getBy(int $unidad_id) : Collection
    {
        return arg_empr_unidades::where('unidad_id', $unidad_id)
                                ->first();
    }
}