<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Notification;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Dashboard extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $evento;

    public $donations, $time, $puntos;
    public $shared, $porcentajeShareds;
    public $raised, $porcentajeRaised;
    public $donors, $porcentajeDonors;

    protected $listeners = ['notificaciones' => 'pushear'];

    public function pushear(){
        if (isset($this->evento)) {

            if( isset(Auth::user()->phone) ){
                
            }else{
                $mensaje = 'completion your profile <br>';
                $tipo = 'Notification';
                $accion = 'href="'.route('profile.show').'" target="_blank"';
                $this->dispatchBrowserEvent('toasts', ['mensaje' => $mensaje, 'tipo' => $tipo, 'accion' => $accion]);
                LOG::info('noPerfil');
            }
            
        }else{
            $mensaje = 'Create an event to start the fundraiser <br>';
            $tipo = 'Notification';
            $accion = 'href="'.route('editevent').'" target="_blank"';
            $this->dispatchBrowserEvent('toasts', ['mensaje' => $mensaje, 'tipo' => $tipo, 'accion' => $accion]);
            LOG::info('noEvent');
        }
    }

    public function sacarPorcentaje($oldNumber, $newNumber){
        if ($oldNumber !== 0) {
            $decreaseValue = $oldNumber - $newNumber;
            return ($decreaseValue / $oldNumber) * 100;
        } else {
            return 0;
        }
    }
  
    public function mount()
    {
        
        // => function ($query) { $query->where('user_id', Auth::user()->id); }
        $fechaActual = Carbon::now();
        $ayer = Carbon::yesterday()->format('Y-m-d');
        $anteAyer = Carbon::now()->subDay(2)->format('Y-m-d');

        $this->evento = Event::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if ( isset( $this->evento->created_at ) ) {
            $fechaInicial = Carbon::parse($this->evento->created_at);
            $fechaFinal = Carbon::parse($this->evento->created_at)->addDays($this->evento->duration);
            $diasTranscurridos = $fechaActual->diffInDays($fechaInicial);
            // $time = $fechaActual->diffInDays($fechaFinal);
            $this->time = $this->evento->duration - $diasTranscurridos;
            $this->puntos = $this->evento->points->sum('count');
        }else{
            $fechaInicial = '1999-01-01';
            $this->time = 0;
            $this->puntos = 0;
        }

        //---------
        if ( isset( $this->evento->shareds ) ) {
            $this->shareds = $this->evento->shareds()->orderBy('id', 'desc')->first()->count ?? 0;
                        
            $cantAyerShareds = $this->evento->shareds()->whereDate('created_at', $ayer)->orderBy('id', 'desc')->first()->count ?? 0;

            if ($cantAyerShareds !== 0) {
                $this->porcentajeShareds = abs( $this->sacarPorcentaje( $cantAyerShareds, $this->shareds ) );
            } else {
                $this->porcentajeShareds = 0;
            }            
        } else {
            $this->shareds = 0;
            $this->porcentajeShareds = 0;
        }
        //---------------------

        if ( isset( $this->evento->donations ) ) {
            
            $donaciones = $this->evento->donations()->where('event_id', $this->evento->id)->whereDate('created_at', $fechaActual)->orderBy('id', 'desc')->get() ?? 0;

            $donacionesAyer = $this->evento->donations()->where('event_id', $this->evento->id)->whereDate('created_at', $ayer)->orderBy('id', 'desc')->get() ?? 0;

            $donacionesAntesAyer = $this->evento->donations()->where('event_id', $this->evento->id)->whereBetween('created_at', [$fechaInicial, $anteAyer])->orderBy('id', 'desc')->get() ?? 0;

            $totalMoneyHoy = 0;
            $totalMoneyAyer = 0;
            $totalMoneyAntier = 0;
            
            $totalDonHoy = 0;
            $totalDonAyer = 0;
            $totalDonAntier = 0;

            if ( isset( $donaciones ) ) {
                foreach ($donaciones as $donacion) {
                    $totalDonHoy += $donacion->count;
                    $totalMoneyHoy += $donacion->money;
                };
            } else {
                $totalDonHoy = 0;
                $totalMoneyHoy = 0;
            };

            if ( isset( $donacionesAyer ) ) {
                foreach ($donacionesAyer as $donacionAyer) {
                    $totalDonAyer += $donacionAyer->count;
                    $totalMoneyAyer += $donacionAyer->money;
                };
            } else {
                $totalDonAyer = 0;
                $totalMoneyAyer = 0;
            };

            if ( isset( $donacionesAntesAyer ) ) {
                foreach ($donacionesAntesAyer as $donacionAntier) {
                    $totalDonAntier += $donacionAntier->count;
                    $totalMoneyAntier += $donacionAntier->money;
                };
            } else {
                $totalDonAyer = 0;
                $totalMoneyAyer = 0;
            };
            
            $this->raised = ($totalMoneyHoy + $totalMoneyAyer + $totalMoneyAntier) / 2;
            $this->porcentajeRaised = abs( $this->sacarPorcentaje( $totalMoneyAyer, $totalMoneyHoy ) );
            $this->donors = $totalDonHoy + $totalDonAyer + $totalDonAntier;
            $this->porcentajeDonors = abs( $this->sacarPorcentaje( $totalDonAyer, $totalDonHoy ) );
        } else {
            $this->raised = 0; 
            $this->porcentajeRaised = 0;
            $this->donors = 0;
            $this->porcentajeDonors = 0;
        }

        // calcular % Porcentaje
        // $6/$5*100

        Log::info('desde el mount');
        
        
        Log::info('cierro desde el mount');
    }

    public function logged($data){
        Log::info($data);
    }
  
    public function borrar(){
        Log::info('se borrara evento');
        $notificar = Notification::create([
            'user_id' => Auth::user()->id,
            'receiver_id' => 1,
            'event_id' => $this->evento->id,
            'view' => false,
            'success' => 4,
            'deleted_receiver' => false,
        ]);

        Log::info('$notificar');
        Log::info($notificar);

        Event::find($this->evento->id)->delete();
        
        session()->flash('message', 'evento borrado correctamente.');
        
        Log::info($this->evento);
        
        $this->mount();
    }

    public function render()
    {
        
        return view('dashboard');
            
    }

}
