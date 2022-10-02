<?php

namespace App\Http\Livewire\Componentes;

use App\Models\Event;
use App\Models\Message;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContactOrg extends Component
{
    // protected $listeners = ['notificacionesMenu' => 'enviar'];

    public $name, $email, $body, $event;


    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'body' => 'required',
    ];

    public function enviar(){
        if (auth()->check()) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $remitente = auth()->user()->id;
        }else{
            $remitente = null;
        }
        $id_receiver = $this->event->user->id;

        LOG::info($this->name);
        LOG::info($this->email);
        LOG::info($this->body);
        LOG::info($id_receiver);

        $mensajear = Message::create([
            'remitter_id' => $remitente,
            'receiver_id' => $id_receiver,
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body,
            'view' => false,
            'deleted_remitter' => false,
            'deleted_receiver' => false,
        ]);

        session()->flash('message', 'Your message has been sent. Thank you!');
        LOG::info('$this->Menssage');
        LOG::info($mensajear);
    }

    public function mount($evento){

        $this->event = $evento;
        
        if (auth()->check()) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }else{
            $this->name = null;
            $this->email = null;
        }
        $this->body = null;
    }

    public function render()
    {
        return view('livewire.componentes.contact-org');
    }
}
