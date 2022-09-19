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

class EditEvent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $eventImage1 = [];
    public $title1;
    public $description1;
    //public $eventImage2;
    public $title2;
    public $description2;
    //public $eventImage3;
    public $title3;
    public $description3;
    public $duration;
    public $evento;
  
    protected $rules = [
        //'duration' => 'required',
        //'eventImage1.*' => 'image',
        'title1' => 'required',
        'description1' => 'required',
        //'eventImage2' => 'required|image|mimes:jpeg,png,jpg,gif,svg',        
        //'title2' => 'required',
        //'description2' => 'required',
        //'eventImage3' => 'required|image|mimes:jpeg,png,jpg,gif,svg',        
        //'title3' => 'required',
        //'description3' => 'required'
    ];

    public function mount()
    {
        $this->evento = Event::where('user_id', Auth::user()->id)->first();
        
        if ($this->evento) {
            $this->eventImage1 = []; //$this->evento->eventImage2;
            $this->title1 = $this->evento->title1;
            $this->description1 = $this->evento->description1;
            //$this->eventImage2 = $this->evento->eventImage2;
            $this->title2 = $this->evento->title2;
            $this->description2 = $this->evento->description2;
            //$this->eventImage3 = $this->evento->eventImage3;
            $this->title3 = $this->evento->title3;
            $this->description3 = $this->evento->description3;
            $this->duration = 30;
        }else{
            $this->eventImage1 = [];
            $this->title1 = '';
            $this->description1 = '';
            //$this->eventImage2 = null;
            $this->title2 = '';
            $this->description2 = '';
            //$this->eventImage3 = null;
            $this->title3 = '';
            $this->description3 = '';
            $this->duration = 30;
        }

        Log::info('desde el mount');
        Log::info($this->evento ?? 'no hay evento');
        Log::info('cierro desde el mount');
    }

    public function slug($valor)
    {
        $unidad = $valor ?? null;

        $valorAleatorio = uniqid();
        $slug = Str::of($this->title1)->slug("-")->limit(255 - mb_strlen($valorAleatorio) - 1, "")->trim("-")->append("-", $valorAleatorio).Str::of($unidad);

        Log::info('un slug');
        Log::info($slug ?? 'no hay evento');
        Log::info('cierro slug');

        return $slug;
    }
  
    public function existe()
    {
      if (array_key_exists(0,$this->eventImage1)) {
        return $this->eventImage1[0];
      }else{
        return null;
      };
    }

    public function save()
    {
      
        Validator::make(
            ['Imagen' => $this->existe()],
            ['Imagen' => 'required'],
            ['required' => 'The :attribute field is required'],
        )->validate();
      
        $this->validate();
      
        $this->validate([
            'eventImage1.*' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240',    
        ]);
      
        Log::info($this->eventImage1);

        Log::info('desde save');

        if($this->evento){

            Log::info('desde save evento no es null');

            Log::info(array_key_exists(0,$this->eventImage1));
            Log::info(array_key_exists(1,$this->eventImage1));
            Log::info(array_key_exists(2,$this->eventImage1));

            if (array_key_exists(0,$this->eventImage1)) {
                $storedImage1 = $this->eventImage1[0]->storeAs('public/eventImage', Str::substr($this->evento->eventImage1, 19));
                $ruta1 = $this->evento->eventImage1;
            }else{
                $ruta1 = $this->evento->eventImage1;
            };

            if (array_key_exists(1,$this->eventImage1)) {
                $storedImage2 = $this->eventImage1[1]->storeAs('public/eventImage', Str::substr($this->evento->eventImage2, 19));
                $ruta2 = $this->evento->eventImage2;
            }else{
                $ruta2 = $this->evento->eventImage2;
            };

            if (array_key_exists(2,$this->eventImage1)) {
                $storedImage3 = $this->eventImage1[2]->storeAs('public/eventImage', Str::substr($this->evento->eventImage3, 19));
                $ruta3 = $this->evento->eventImage3;
            }else{
                $ruta3 = $this->evento->eventImage3;
            };

            Log::info($ruta1);
            Log::info($ruta2);
            Log::info($ruta3);
            
            
            Event::find($this->evento->id)->update([
                'user_id' => $this->evento->user_id,
                'slug' => $this->evento->slug,
                'duration' => $this->duration,
                'eventImage1' => $ruta1,
                'title1' => $this->title1,
                'description1' => $this->description1,
                'eventImage2' => $ruta2,
                'title2' => $this->title2,
                'description2' => $this->description2,
                'eventImage3' => $ruta3,
                'title3' => $this->title3,
                'description3' => $this->description3,
                'view_count' => $this->evento->view_count,
                'shared_count' => $this->evento->shared_count,
            ]);

            $notificar = Notification::create([
                'user_id' => Auth::user()->id,
                'receiver_id' => 1,
                'event_id' => $this->evento->id,
                'view' => false,
                'success' => 3,
                'deleted_receiver' => false,
            ]);

            session()->flash('message', 'successfully update event.');

        }else{
            
            Log::info('desde save evento es null');
            
            Log::info(array_key_exists(0,$this->eventImage1));
            Log::info(array_key_exists(1,$this->eventImage1));
            Log::info(array_key_exists(2,$this->eventImage1));
            
            if (array_key_exists(0,$this->eventImage1)) {
                $extencion1 = $this->eventImage1[0]->getClientOriginalExtension();
                $storedImage1 = $this->eventImage1[0]->storeAs('public/eventImage', $this->slug(1).'.'.$extencion1);
                $ruta1 = 'storage/' . Str::substr($storedImage1, 7);
            };

            if (array_key_exists(1,$this->eventImage1)) {
                $extencion2 = $this->eventImage1[1]->getClientOriginalExtension();
                $storedImage2 = $this->eventImage1[1]->storeAs('public/eventImage', $this->slug(2).'.'.$extencion2);
                $ruta2 = 'storage/' . Str::substr($storedImage2, 7);
            }else{
                $ruta2 = $ruta1;
            };

            if (array_key_exists(2,$this->eventImage1)) {
                $extencion3 = $this->eventImage1[2]->getClientOriginalExtension();
                $storedImage3 = $this->eventImage1[2]->storeAs('public/eventImage', $this->slug(3).'.'.$extencion3);
                $ruta3 = 'storage/' . Str::substr($storedImage3, 7);
            }else{
                $ruta3 = $ruta1;
            };
            
            $eventoNuevo = Event::create([
                'user_id' => Auth::user()->id,
                'slug' => $this->slug(0),
                'duration' => $this->duration,
                'eventImage1' => $ruta1,
                'title1' => $this->title1,
                'description1' => $this->description1,
                'eventImage2' => $ruta2,
                'title2' => $this->title2,
                'description2' => $this->description2,
                'eventImage3' => $ruta3,
                'title3' => $this->title3,
                'description3' => $this->description3,
                'view_count' => 0,
                'shared_count' => 0,
            ]);
            
            $notificar = Notification::create([
                'user_id' => Auth::user()->id,
                'receiver_id' => 1,
                'event_id' => $eventoNuevo->id,
                'view' => false,
                'success' => 1,
                'deleted_receiver' => false,
            ]);
            
            session()->flash('message', 'successfully created event.');
            
        }
            
      // $this->mount();
      redirect('/editevent');
        
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
        
        return view('livewire.edit-event');
            
    }
}
