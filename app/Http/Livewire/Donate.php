<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Point;
use App\Models\Partner;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Donate extends Component
{
    public $event;
    public $event_id;
    public $id_usuario;

    protected $queryString = ['event'];

    public function mount(){
        
        if (auth()->check()) {
            if (session()->has('redirect_to')) {
                session()->forget('redirect_to');
            }
            //session(['redirect_to' => url()->full()]);
            if (session()->has('back')) {
                session()->forget('back');
            }
            session(['back' => url()->full()]);
            if (session()->has('donation')) {
                $ticket = session('donation.ticket');
                $veces = session('donation.veces');
                $this->donate($ticket, $veces);
            }
            $this->id_usuario = Auth::user()->id;
            $countGames = Donation::where('user_id', Auth::user()->id)->whereRaw('playeds < count')->get();
            $restantes = 0;
            foreach ($countGames as $jugadas) {
                $playeds = $jugadas->playeds;
                $count = $jugadas->count;
                $plays = $count - $playeds;
                $restantes += $plays;
            };
            if (session()->has('games')) {
                session()->forget('games'); 
            } 
            if ($restantes !== 0) {
                session(['games' => $restantes]);
            }else{
                if (session()->has('games')) {
                    session()->forget('games'); 
                }
            };
        }else{
            if (session()->has('games')) {
                session()->forget('games'); 
            }
            if (session()->has('redirect_to')) {
                session()->forget('redirect_to');
            }
            session(['redirect_to' => url()->full()]);
            if (session()->has('back')) {
                session()->forget('back');
            }
            session(['back' => url()->full()]);
        }
        
        if ($this->event) {
            $this->event_id = Event::where('slug', $this->event)->where('status', '<', 3)->get();
            Log::info($this->event);
            Log::info($this->event_id);
            // Log::info($this->event_id[0]->id); //
        }else{
            $this->event_id = Event::where('status', '<', 3)->get();
            if (isset($this->event_id->first()->slug)) {
                $this->event = $this->event_id->first()->slug;
            }else{
                $this->event = 'Not-Event';
            }
            Log::info($this->event);
            // Log::info($this->event_id[0]->id); //
        }
        
    }

    public function render()
    {
        $partner = Partner::get();
        return view('livewire.donate',['partners' => $partner])
            ->layout('layouts.guest');
    }

    public function donate($ticket, $veces){
        Log::info('el ticket: ');
        Log::info($ticket);
        Log::info('las veces: ');
        Log::info($veces);

        if (auth()->check()) {
            $money = $ticket * $veces;

            if (session()->has('donation')) {
                $id_evento = session('donation.id_evento');
            }else{
                $id_evento = $this->event_id->first()->id;
            }

            $donacionCreada = Donation::create([
                'user_id' => Auth::user()->id,
                'event_id' => $id_evento,
                'ticket' => $ticket,
                'count' => $veces,
                'playeds'  => 0,
                'money'  => $money
            ]);

            Log::info($donacionCreada);

            if (session()->has('donation')) {
                session()->forget('donation');
            }

            //----------------------------

            Log::info('ya se hizo la donacion voy a contar los puntos');
            $limite = 5;
            $evento_donate = Event::where('id', $id_evento)->orderBy('id', 'desc')->first();
            Log::info($evento_donate);
            
            $countDonations = Donation::where('event_id', $id_evento)->count();
                        
            for ($i=1; $i < $countDonations*$i*10000; $i++) { 
                $limiteActual = $limite * $i;
                Log::info($limiteActual);
                Log::info($countDonations);
                if ($countDonations < $limiteActual) {
                    Log::info('limiteActual es mayor a countDonations');
                    Log::info($limiteActual);
                    break;
                } else if ($countDonations === $limiteActual) {
                    // $evento_donate->points()->orderBy('id', 'desc')->first()->count;
                    if (isset($evento_donate->points()->orderBy('id', 'desc')->first()->count)) {
                        $evento_donate->points()->create([
                            'count' => 10,
                        ]);
                        Log::info('Si existe count en el array');
                        Log::info($evento_donate->points()->orderBy('id', 'desc')->first()->count);
                    }else{
                        $evento_donate->points()->create([
                            'count' => 10,
                        ]);
                        Log::info('No existe count en el array');
                    }
                    Log::info('count y limite son iguales');
                    Log::info('limiteActual');
                    Log::info($limiteActual);
                    Log::info('countDonations');
                    Log::info($countDonations);
                    break;
                } else if ($countDonations > $limiteActual) {
                    Log::info('limiteActual es menor a countDonations');
                    Log::info($limiteActual);
                    continue;
                }
            }
            Log::info('ya conte los puntos voy a redirigir');
            //----------------------------

            redirect('/game');
        }else{
            if (session()->has('donation')) {             
            }else{
                session(['donation' => [ 'ticket' => $ticket, 'veces' => $veces, 'id_evento' => $this->event_id->first()->id]]);
            }
            // $this->emit('noLoged');
            $this->dispatchBrowserEvent('noLoged');
        }
    }

    public function deletDonation(){
        if (session()->has('donation')) {
            session()->forget('donation');
        }
        if (session()->has('action')) {
            session()->forget('action');
        }
    }

    public function detectAction($action){
        if ($action === "login") {
            session(['action' => 'login']);
        } else {
            if (session()->has('action')) {
                session()->forget('action');
            }
        }
    }
    
}
