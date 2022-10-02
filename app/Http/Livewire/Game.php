<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Mail\UserWiner;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Winer;
use App\Models\Partner;
use Illuminate\Support\Facades\Mail;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Game extends Component
{
    public $partnerActual = null;
    public $premio = null;
    public $imgPremio = null;
    public $ticket = null;
    public $suerte = false;
    public $evento = null;
    public $continue = false;
    public $consulta = null;
    public $eventSlug = null;
    protected $listeners = ['raspado' => 'restarPlayeds'];
 
    public function mount()
    {
        if (auth()->check()) {
            $this->consulta = Donation::where('user_id', Auth::user()->id)->whereRaw('playeds < count')->first();
            Log::info($this->consulta);
            if($this->consulta){
                
                $idEvent = $this->consulta->event_id;
                $event = Event::where('id', $idEvent)->first();
                $this->evento = $event;
                $this->eventSlug = $event->slug;

                $playeds = $this->consulta->playeds + 1;
                $count = $this->consulta->count;
                if ($playeds < $count) {
                    $this->continue = true;
                }else{
                    $this->continue = false;
                }

                //-----------------------------------
                // suerte

                $limite = 3;
                $this->ticket = $this->consulta->ticket;
                
                $countDonations = Donation::where('ticket', $this->ticket)->get();
                $suma = 0;
                foreach ($countDonations as $jugadas) {
                    $suma += $jugadas->playeds;
                };
                
                for ($i=1; $i < $suma*$i*10000; $i++) { 
                    $limiteActual = $limite * $i;
                    Log::info($limiteActual);
                    if ($suma < $limiteActual) {
                        $this->suerte = false;
                        Log::info('suerte');
                        Log::info($this->suerte);
                        break;
                    } else if ($suma === $limiteActual) {
                        $this->suerte = true;
                        Log::info('suerte');
                        Log::info($this->suerte);
                        break;
                    } else if ($suma > $limiteActual) {
                        $this->suerte = false;
                        Log::info('suma');
                        Log::info($suma);
                        Log::info('limiteActual');
                        Log::info($limiteActual);
                        continue;
                    }
                }

                // -----------------------------------
                // premios.

                $tipoPremio = $this->suerte ? 'gifcard' : 'cupon' ;

                if ($this->ticket == 2) {
                    $this->premio = $tipoPremio . '1';
                } else if ($this->ticket == 4) {
                    $this->premio = $tipoPremio . '2';
                } else {
                    $this->premio = $tipoPremio . '3';
                }

                $ultPartner = Winer::orderBy('id', 'desc')->first();
                $totalPartners = Partner::count();
                LOG::info('$ultPartner');
                LOG::info($ultPartner);
                LOG::info('$totalPartners');
                LOG::info($totalPartners);

                if ( isset($ultPartner->partner_id) ) {
                    if ($ultPartner->partner_id < $totalPartners) {
                        $this->partnerActual = $ultPartner->partner_id + 1;
                    }else if ($ultPartner->partner_id === $totalPartners){
                        $this->partnerActual = 1;
                    }
                } else {
                    $this->partnerActual = 1;
                }
                $premio = $this->premio;
                
                $partner = Partner::where('id', $this->partnerActual)->first();
                
                if (isset($partner->$premio)) {
                    $this->imgPremio = $partner->$premio;
                }else{
                    $this->imgPremio = $partner->$tipoPremio . '1';
                    //$this->imgPremio = null;
                }
                if (isset($partner->link)) {
                    $this->enlace = $partner->link;
                }else{
                    $this->enlace = null;
                }
                Log::info($this->imgPremio);

            }else{
                $ultimateDonations = Donation::where('user_id', Auth::user()->id)->first();
                $idEvent = $ultimateDonations->event_id;
                $event = Event::where('id', $idEvent)->first();
                $this->evento = $event;
                $this->eventSlug = $event->slug;
            }
        }else{
            $event = Event::first();
            $this->evento = $event;
            $this->eventSlug = $event->slug;
            //redirect('/login');
        }
        
        if (auth()->check()) {
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
        }
        
        Log::info($this->ticket);
    }

    public function render()
    {
        return view('livewire.game')
            ->layout('layouts.guest');
    }

    public function restarPlayeds()
    {
        $this->consulta->update(['playeds' => $this->consulta->playeds+1,]);

        $valorAleatorio = uniqid();
        
        $slug = Str::of($this->premio)->slug("-")->limit(255 - mb_strlen($valorAleatorio) - 1, "")->trim("-")->append("-", $valorAleatorio).Str::of($this->partnerActual);

        Winer::create([
            'user_id' => Auth::user()->id,
            'partner_id' => $this->partnerActual,
            'premio' => $this->premio,
            'slug_id' => $slug,
        ]);

        LOG::info('email');
        LOG::info(Auth::user()->email);


        $envio = Mail::to(Auth::user()->email)
                    ->send( new UserWiner(
                        $this->premio, $this->partnerActual, $slug, $this->suerte, $this->imgPremio, $this->enlace
                    ) );

        LOG::info('$envio');
        LOG::info($envio);

    }
}
