<?php

namespace App\Http\Livewire\Navegacion;

use App\Models\Event;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NavigationMenu extends Component
{
    protected $listeners = ['notificacionesMenu' => 'pushear'];

    public function pushear(){
        
        $mensaje = 'Notificacion desde el menu';
        $tipo = 'Notification';
        $accion = Null;
        $this->dispatchBrowserEvent('toasts', ['mensaje' => $mensaje, 'tipo' => $tipo, 'accion' => $accion]);
        $this->dispatchBrowserEvent('toasts', ['mensaje' => $mensaje, 'tipo' => 'mensaje', 'accion' => $accion]);
        $this->mount();
        
    }

    public function mount(){

    }

    public function render()
    {
        return view('livewire.navegacion.navigation-menu');
    }
}
