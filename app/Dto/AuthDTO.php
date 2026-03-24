<?php

namespace App\DTO;

use App\Http\Requests\Auth\SignInAuthRequest;

class AuthDTO
{
    public string $codigo;
    public string $clave;

    public function __construct(string $codigo, string $clave)
    {
        $this->codigo = $codigo;
        $this->clave = $clave;
    }

    public static function fromRequest(SignInAuthRequest $request): self
    {
        return new self(
            $request->codigo,
            $request->clave
        );
    }
}
