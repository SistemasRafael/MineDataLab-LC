<?php

namespace App\Services\Usuarios;

use App\DTO\ArgUsuariosDTO;
use App\Models\arg_usuarios as Usuarios;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UsuariosService {

    public function getAll() : LengthAwarePaginator 
    {
        return Usuarios::latest('id')
                        ->paginate(Usuarios::PAGINATE);
    }

    public function create(array $usuario) : Usuarios 
    {
        return Usuarios::create($usuario);
    }

    public function getUserBy(string $codigo, string $clave): ?Usuarios
    { 
        return Usuarios::where('codigo', $codigo)
                        ->where('clave', md5($clave))
                        ->first();
    }

    public function getUserDirectivesBy(string $codigo): ?ArgUsuariosDTO
    { 
        $data = Usuarios::from('arg_usuarios as u')
                        ->join('arg_usuarios_directivas as uni', 'uni.u_id', '=', 'u.u_id')
                        ->where('u.codigo', $codigo)
                        ->select([
                            'u.u_id',
                            'u.codigo',
                            'u.nombre',
                            'u.email',
                            'uni.valor as unidades',
                            DB::raw("
                                CASE 
                                    WHEN uni.valor = '0' THEN '1' 
                                    ELSE SUBSTRING_INDEX(uni.valor, ',', 1)
                                END AS unidad_def
                            "),
                            DB::raw("
                                CASE 
                                    WHEN uni.valor = '0' THEN '0' 
                                    WHEN uni.valor LIKE '%,%' THEN 999 
                                    ELSE uni.valor 
                                END AS unidad_acc
                            ")
                        ])
                        ->first();
        
        return $data ? ArgUsuariosDTO::fromModel($data) : null;
    }
}