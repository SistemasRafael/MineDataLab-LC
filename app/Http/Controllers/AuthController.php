<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignInAuthRequest;
use App\Services\Usuarios\UsuariosService;
use App\DTO\AuthDTO;
use App\Services\SessionService;

class AuthController extends Controller
{
    public function __construct(
        protected UsuariosService $usuariosService,
        protected SessionService $sessionService
    )
    {
    }

    public function index()
    {
        return view('auth.index');
    }

    public function signIn(SignInAuthRequest $request)
    {
        $authDTO = AuthDTO::fromRequest($request);

        $user = $this->usuariosService->getUserBy($authDTO->codigo, $authDTO->clave);

        if (!$user) {
            return Redirect()
                   ->back()
                   ->with('message-error', 'codigo o clave incorrectos');
        }
        
        $this->sessionService->createUserSession($user);

        $userDirectivas = $this->usuariosService->getUserDirectivesBy($authDTO->codigo);
        if ($userDirectivas) {
            $this->sessionService->createUserDirectivesSession($userDirectivas);
        }

        return Redirect()
               ->route('usuarios.index')
               ->with('message-success', 'Usuario logiado exitosamente!');
    }

    public function logOut()
    {
        $this->sessionService->destroySession();

        return Redirect()->route('auth.index');
    }
}
