<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CambiarMina extends Component
{
    public array  $minaSeleccionada = [];
    public array $minas;

    /**
     * Create a new component instance.
     */
    public function __construct(array $minaSeleccionada, array $minas)
    {
        $this->minaSeleccionada = $minaSeleccionada;
        $this->minas = $minas;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cambiar-mina');
    }
}
