<?php

namespace App\Http\Livewire\Navegacion;

use App\Models\Event;
use App\Models\Notification;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NavigationMenu extends Component
{
    protected $listeners = ['notificacionesMenu' => 'pushear'];

    public $notificaciones;

    public function pushear(){
        if (auth()->user()->hasRole('admin')) {
            $paNotificar = $this->notificaciones->filter(function ($noty){
                            return $noty->deleted_receiver === 0;
                        });
        }else{
            $paNotificar = $this->notificaciones->filter(function ($noty){
                            return $noty->view === 0;
                        });
        }
        
        // $mensaje = 'Notificacion desde el menu';
        // $tipo = 'Notification';
        // $accion = Null;
        foreach ($paNotificar as $noty) {
            if (isset($noty->event->slug)) {
                $accion = url('/event') . '/' . $noty->event->slug;
            }
            if (auth()->user()->hasRole('admin')) {
                $mensaje = '<h6 class=""><strong>User '. $noty->event->user->name .', Event '.$noty->Consuccess.'</strong></h6><p class="">'.$noty->event->title1.'</p>';
            }else{
                $mensaje = '<h6 class=""><strong>Event '.$noty->Consuccess.'</strong></h6><p class="">'.$noty->event->title1.'</p>';
            }
            $this->dispatchBrowserEvent('toasts', ['mensaje' => $mensaje, 'tipo' => 'Notification', 'accion' => $accion, 'fecha' => $noty->created_at]);
        }
        

    }

    public function viewAll(){
        if (auth()->user()->hasRole('admin')) {
            Notification::where('receiver_id', Auth::user()->id)
                        ->update(['deleted_receiver' => true]);
        }else{
            Notification::where('user_id', Auth::user()->id)
                        ->update(['view' => true]);
        }

        $this->mount();
                
    }

    public function mount(){
        if (auth()->user()->hasRole('org')) {
            $this->notificaciones = Notification::where('user_id', Auth::user()->id)
                                    ->with('event')
                                    ->orderBy('id', 'desc')
                                    ->get();

            LOG::info('$this->notificaciones');
            LOG::info($this->notificaciones);
        } else {
            $this->notificaciones = Notification::with('event','event.user')
                                    ->orderBy('id', 'desc')
                                    ->get();

            LOG::info('$this->notificaciones');
            LOG::info($this->notificaciones);
        }

    }

    public function render()
    {
        return view('livewire.navegacion.navigation-menu');
    }
}
