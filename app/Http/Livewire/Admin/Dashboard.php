<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;

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

    public $eventos;

    public $shareds;
    public $raised;
    public $donors;

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
        $this->eventos = Event::with('donations','shareds','points')
        ->get();

        //---------
        foreach($this->eventos as $evento){
            if ( isset( $evento->shareds()->orderBy('id', 'desc')->first()->count ) ) {
                $this->shareds += $evento->shareds()->orderBy('id', 'desc')->first()->count;
            } else {
                $shareds = 0;
            }
        }
        //---------------------
        foreach($this->eventos as $evento){
            if ( isset( $evento->donations ) ) {
                
                $donaciones = $evento->donations()->where('event_id', $evento->id)->orderBy('id', 'desc')->get();

                $totalMoneyHoy = 0;
                $totalDonHoy = 0;

                if ( isset( $donaciones ) ) {
                    foreach ($donaciones as $donacion) {
                        $totalDonHoy += $donacion->count;
                        $totalMoneyHoy += $donacion->money;
                    };
                } else {
                    $totalDonHoy = 0;
                    $totalMoneyHoy = 0;
                };

                $this->raised += $totalMoneyHoy;
                $this->donors += $totalDonHoy;
                
            } else {
                $this->raised = 0; 
                $this->donors = 0;
            }
        }

        Log::info('desde el mount');
        
        
        Log::info('cierro desde el mount');
    }

    public function logged($data){
        Log::info($data);
    }
  
    public function borrar(){
        Log::info('se borrara evento');
        Event::find($evento->id)->delete();
        
        session()->flash('message', 'evento borrado correctamente.');
        
        Log::info($this->evento);
        
        $this->mount();
    }

    public function render()
    {
        
        return view('livewire.admin.dashboard');
            
    }
}
