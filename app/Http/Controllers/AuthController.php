<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignInAuthRequest;
use App\Services\Usuarios\UsuariosService;
use App\Services\LdapService;
use App\DTO\AuthDTO;
use App\Services\SessionService;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        protected UsuariosService $usuariosService,
        protected SessionService $sessionService,
        protected LdapService $ldap
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
        
        if ($this->ldap->authenticate($authDTO->codigo, $authDTO->clave)) {
            
            $user = $this->usuariosService->getUserByCodigo($authDTO->codigo);

            if (!$user) {
                throw ValidationException::withMessages(['UsuarioNoExisteEnBaseDeDatos' => 'Usuario autenticado en LDAP pero no existe en la base de datos. Contacte al administrador.']);
            }
            
            $this->sessionService->createUserSession($user);

            $userDirectivas = $this->usuariosService->getUserDirectivesBy($authDTO->codigo);

            $this->sessionService->createUserDirectivesSession($userDirectivas);

            return Redirect()
                ->route('usuarios.index');
        }   
        else {
            throw ValidationException::withMessages(['CodioClaveIncorrectos' => 'Código o clave incorrectos.']);
        }

    }

    public function logOut()
    {
        $this->sessionService->destroySession();

        return Redirect()->route('auth.index');
    }
}
