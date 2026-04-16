<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignInAuthRequest;
use App\Services\Usuarios\UsuariosService;
use App\DTO\AuthDTO;
use App\Services\SessionService;
use Illuminate\Validation\ValidationException;

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
        return view('auth.signIn');
    }

    public function signIn(SignInAuthRequest $request)
    {
        $authDTO = AuthDTO::fromRequest($request);

        $user = $this->usuariosService->getUserBy($authDTO->codigo, $authDTO->clave);

        if (!$user) {
            throw ValidationException::withMessages([
                'CodioClaveIncorrectos' => 'Código o clave incorrectos.',
            ]);
        }
        
        $this->sessionService->createUserSession($user);

        $userDirectivas = $this->usuariosService->getUserDirectivesBy($authDTO->codigo);
        if ($userDirectivas) {
            $this->sessionService->createUserDirectivesSession($userDirectivas);
        }

        return Redirect()
               ->route('usuarios.index');
    }

    public function logOut()
    {
        $this->sessionService->destroySession();

        return Redirect()->route('auth.index');
    }
}
