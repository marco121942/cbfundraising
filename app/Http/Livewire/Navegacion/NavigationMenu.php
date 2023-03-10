<?php

namespace App\Http\Livewire\Navegacion;

use App\Models\Event;
use App\Models\Notification;
use App\Models\Message;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NavigationMenu extends Component
{
    protected $listeners = [
                            'notificacionesMenu' => 'pushear',
                            'openModalMsj' => 'abrirModal'
                            ];

    public $notificaciones, $messages, $toma, $body;
    public $isModalOpen = null;

    public function reiniciar(){
        $this->mount();
    }

    public function pushear(){
        if (session()->has('pusheado')) {
            $pusheado = session('pusheado') ? true : false ;
        }else{
            $pusheado = false;
        }
        
        if ($pusheado === false) {
            
            if (auth()->user()->hasRole('admin')) {
                $paNotificar = $this->notificaciones->filter(function ($noty){
                                return $noty->deleted_receiver === 0;
                            });
            }else{
                $paNotificar = $this->notificaciones->filter(function ($noty){
                                return $noty->view === 0;
                            });
            }
            $mensajes = $this->messages;

            $paMensajear = $mensajes->sortBy('created_at')
                                    ->filter(function ($sms){
                                        if ($sms->receiver_id == Auth::user()->id && $sms->view == false) {
                                            return $sms->receiver_id == Auth::user()->id;
                                        }
                                    })->unique('remitter_id');

            foreach ($paNotificar as $noty) {
                $accion = null;
                $tituloNoty1 = '';
                $nameNoty = '';
                $piePagina = '';
                if (isset($noty->event->title1)) {
                    $tituloNoty1 = $noty->event->title1;
                }
                if (isset($noty->event->user->name)) {
                    $nameNoty = $noty->event->user->name;
                }
                
                if (isset($noty->event->slug)) {
                    $accion = 'href="'.url('/event') . '/' . $noty->event->slug.'#accion" target="_blank"';
                    $piePagina = '<hr class="py-0 my-0">
                      <small class="small text-muted">Event Shared</small> <br>';
                };
                if (auth()->user()->hasRole('admin')) {
                    $mensaje = '<h6 class="py-0 my-0"><strong class="text-muted">User '. $nameNoty .', <br> Event '.$noty->Consuccess.'</strong></h6><p class="py-0 my-0 text-muted">'.$tituloNoty1.'</p>';
                }else{
                    $mensaje = '<h6 class="py-0 my-0"><strong class="text-muted">Event '.$noty->Consuccess.'</strong></h6><p class="py-0 my-0 text-muted">'.$tituloNoty1.'</p>'.$piePagina;
                };
                $this->dispatchBrowserEvent('toasts', ['mensaje' => $mensaje, 'tipo' => 'Notification', 'accion' => $accion, 'fecha' => $noty->created_at->format('y-m-d H:i')]);
            }

            foreach ($paMensajear as $msj) {
                $accion = null;
                if (isset($msj->remitter_id)) {
                    if ($msj->Isorg == 1) {
                        $accion = 'onclick="modalver('.$msj->remitter_id.')"';
                    }else{
                        $accion = 'onclick="mailtover('.$msj->id.", '".str::before($msj->email, '@')."', '".str::after($msj->email, '@')."')".'"';    
                    }
                }else{
                    $accion = 'onclick="mailtover('.$msj->id.", '".str::before($msj->email, '@')."', '".str::after($msj->email, '@')."')".'"';
                };
                
                $mensaje = '<h6 class="py-0 my-0"><strong>User '.$msj->name.'</strong></h6><p class="py-0 my-0">'.$msj->body.'</p>';
                
                $this->dispatchBrowserEvent('toasts', ['mensaje' => $mensaje, 'tipo' => 'Mensaje', 'accion' => $accion, 'fecha' => $msj->created_at]);
            }
            session(['pusheado' => true]);
        }
    }

    public function send(){
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $remitente = auth()->user()->id;
        $id_receiver = $this->toma;

        $mensajear = Message::create([
            'remitter_id' => $remitente,
            'receiver_id' => $id_receiver,
            'name' => $name,
            'email' => $email,
            'body' => $this->body,
            'view' => false,
            'deleted_remitter' => false,
            'deleted_receiver' => false,
        ]);

        session()->flash('message', 'Your message has been sent. Thank you!');
        // LOG::info('$this->Menssage');
        // LOG::info($mensajear);
        $this->body = '';
        $this->mount();
        $this->abrirModal($id_receiver);
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

            // LOG::info('$this->notificaciones');
            // LOG::info($this->notificaciones);
        } else {
            $this->notificaciones = Notification::with('event','event.user')
                                    ->orderBy('id', 'desc')
                                    ->get();

            // LOG::info('$this->notificaciones');
            // LOG::info($this->notificaciones);
        }
        
        $this->messages = Message::where('remitter_id', Auth::user()->id)
                                    ->orWhere('receiver_id', Auth::user()->id)
                                    ->orderBy('id', 'desc')
                                    ->get();

            // LOG::info('$this->messages');
            // LOG::info($this->messages);
    }

    public function msjVer($idsChat){
        // LOG::info('desde msj ver');
        // LOG::info($idsChat);
        foreach ($idsChat as $key) {
            Message::where('id', $key)
                    ->where('view', false)
                    ->where('receiver_id', Auth::user()->id)
                    ->update(['view' => true]);
        }
        $this->mount();
    }

    public function abrirModal($id)
    {
        $this->toma = $id;
        $this->chat = $this->messages->sortBy('created_at')
                ->filter(function ($mensa){
                    if($mensa->remitter_id === $this->toma && $mensa->receiver_id === Auth::user()->id){
                        return $mensa->remitter_id === $this->toma;
                    };
                    if( $mensa->receiver_id === $this->toma && $mensa->remitter_id === Auth::user()->id){
                        return $mensa->receiver_id === $this->toma;
                    };
                });
                // ->filter(function ($mensa){
                // });
        
        $idsChat = $this->chat->pluck('id');

        $this->msjVer($idsChat);

        $this->isModalOpen = 'go';

        // LOG::info('$this->isModalOpen');
        // LOG::info($this->isModalOpen);
    }

    public function sendAdmin()
    {
        $this->toma = 1;
        $this->chat = $this->messages->sortBy('created_at')
                ->filter(function ($mensa){
                    if($mensa->remitter_id === $this->toma && $mensa->receiver_id === Auth::user()->id){
                        return $mensa->remitter_id === $this->toma;
                    };
                    if( $mensa->receiver_id === $this->toma && $mensa->remitter_id === Auth::user()->id){
                        return $mensa->receiver_id === $this->toma;
                    };
                });
                // ->filter(function ($mensa){
                // });
        
        $idsChat = $this->chat->pluck('id');

        $this->msjVer($idsChat);

        $this->isModalOpen = 'go';

        // LOG::info('$this->isModalOpen');
        // LOG::info($this->isModalOpen);
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = null;
    }

    public function render()
    {
        return view('livewire.navegacion.navigation-menu');
    }
}
