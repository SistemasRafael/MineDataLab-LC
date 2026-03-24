<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\SessionService;
use App\Services\ArgEmprUnidadesService;
use App\Enums\UnidadMinas;

class Layout extends Component
{
    public string $userName;
    public string $minaSeleccionada = 'Cambiar de mina';
    public array $minas;
    
    public function __construct(
        string $userName = '',
        protected SessionService $sessionService,
        protected ArgEmprUnidadesService $argEmprUnidadesService
    )
    {
        $this->userName = $userName;

        $unidad_acc = $this->sessionService->getUnidadAcc();
        if ($unidad_acc === UnidadMinas::TODAS->value) {
            $this->minas = $this->argEmprUnidadesService
                            ->getAll()
                            ->pluck('nombre', 'unidad_id')
                            ->toArray();
        }
        // else if ($unidad_acc === UnidadMinas::VARIAS_MINA->value) {
        //     $this->minas = $this->argEmprUnidadesService
        //                 ->getBy($$unidad_acc)
        //                 ->pluck('unidad_id', 'nombre')
        //                 ->toArray();
        // }
        else if ($unidad_acc <> UnidadMinas::TODAS->value && 
                $unidad_acc <> UnidadMinas::VARIAS_MINA->value) {
            $this->minas = $this->argEmprUnidadesService
                        ->getBy($unidad_acc)
                        ->pluck('nombre', 'unidad_id')
                        ->toArray();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.layout');
    }
}
