<?php

namespace App\Http\Livewire;

use App\Mail\EventCreate;
use Illuminate\Support\Facades\Mail;

use App\Models\Event;
use App\Models\Notification;
use App\Rules\FileType;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;

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
  
    public function existe($posicion)
    {
      if (array_key_exists($posicion,$this->eventImage1)) {
        return $this->eventImage1[$posicion];
      }else{
        return null;
      };
    }

    public function save()
    {
        $objetos = [];
        $reglas = [];

        $objetos['Image'] = $this->existe(0);
        $reglas['Image'] = 'required|mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence,heif,heic';

        foreach($this->eventImage1 as $key => $val)
        {
            if ($key > 0) {
                $objetos['Image '.$key] = $this->existe($key);
                $reglas['Image '.$key] = 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence,heif,heic';
            }
        }
        
        $validator = Validator::make(
            // ['eventImage1' => $this->existe(0)],
            $objetos,
            $reglas,
            // [
            //     'eventImage1' => 'required',
            //     'eventImage1' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence,heif,heic',
            // ],
            [
                'required' => 'The Event Image field is required',
                'mimes' => 'There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif'
            ],
        )->validate();
        
        $this->validate();
        
        // $this->validate([
        //     'eventImage1' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence,heif,heic',
        // ]);

        Log::info('desde save');

        if($this->evento){

            Log::info('desde save evento no es null');

            if (array_key_exists(0,$this->eventImage1)) {
                // $storedImage1 = $this->eventImage1[0]->storeAs('public/eventImage', Str::substr($this->evento->eventImage1, 19));
                $name = 'eventImage/'. Str::substr($this->evento->eventImage1, 19);
                $img = Image::make($this->eventImage1[0])->encode('jpg', 75);
                $img->resize(1024, 540);
                $img->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img->save(public_path('storage/'). $name);

                $ruta1 = $this->evento->eventImage1;
            }else{
                $ruta1 = $this->evento->eventImage1;
            };

            if (array_key_exists(1,$this->eventImage1)) {
                // $storedImage2 = $this->eventImage1[1]->storeAs('public/eventImage', Str::substr($this->evento->eventImage2, 19));
                $name = 'eventImage/'. Str::substr($this->evento->eventImage2, 19);
                $img2 = Image::make($this->eventImage1[1])->encode('jpg', 75);
                $img2->resize(1024, 540);
                $img2->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img2->save(public_path('storage/'). $name);

                $ruta2 = $this->evento->eventImage2;
            }else{
                $ruta2 = $this->evento->eventImage2;
            };

            if (array_key_exists(2,$this->eventImage1)) {
                // $storedImage3 = $this->eventImage1[2]->storeAs('public/eventImage', Str::substr($this->evento->eventImage3, 19));
                $name = 'eventImage/'. Str::substr($this->evento->eventImage3, 19);
                $img3 = Image::make($this->eventImage1[2])->encode('jpg', 75);
                $img3->resize(1024, 540);
                $img3->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img3->save(public_path('storage/'). $name);
                $ruta3 = $this->evento->eventImage3;
            }else{
                $ruta3 = $this->evento->eventImage3;
            };
            
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
            
            if (array_key_exists(0,$this->eventImage1)) {
                // $extencion1 = $this->eventImage1[0]->getClientOriginalExtension();
                // $storedImage1 = $this->eventImage1[0]->storeAs('public/eventImage', $this->slug(1).'.'.$extencion1);
                // $ruta1 = 'storage/' . Str::substr($storedImage1, 7);
                $name = 'eventImage/'. $this->slug(1).'.'.'jpg';
                $img = Image::make($this->eventImage1[0])->encode('jpg', 75);
                $img->resize(1024, 540);
                $img->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img->save(public_path('storage/'). $name);

                $ruta1 = 'storage/' . $name;
            };

            if (array_key_exists(1,$this->eventImage1)) {
                // $extencion2 = $this->eventImage1[1]->getClientOriginalExtension();
                // $storedImage2 = $this->eventImage1[1]->storeAs('public/eventImage', $this->slug(2).'.'.$extencion2);
                // $ruta2 = 'storage/' . Str::substr($storedImage2, 7);
                $name = 'eventImage/'. $this->slug(2).'.'.'jpg';
                $img2 = Image::make($this->eventImage1[1])->encode('jpg', 75);
                $img2->resize(1024, 540);
                $img2->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img2->save(public_path('storage/'). $name);

                $ruta2 = 'storage/' . $name;
            }else{
                $ruta2 = $ruta1;
            };

            if (array_key_exists(2,$this->eventImage1)) {
                // $extencion3 = $this->eventImage1[2]->getClientOriginalExtension();
                // $storedImage3 = $this->eventImage1[2]->storeAs('public/eventImage', $this->slug(3).'.'.$extencion3);
                // $ruta3 = 'storage/' . Str::substr($storedImage3, 7);
                $name = 'eventImage/'. $this->slug(3).'.'.'jpg';
                $img3 = Image::make($this->eventImage1[2])->encode('jpg', 75);
                $img3->resize(1024, 540);
                $img3->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img3->save(public_path('storage/'). $name);

                $ruta3 = 'storage/' . $name;
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

            $userName = Auth::user()->name;
            $enlace = url('/event') . '/' . $this->slug(0);

            // $envio = Mail::to(Auth::user()->email)
            //         ->send( new EventCreate(
            //             $userName, $enlace
            //         ) );

            // LOG::info('$envio');
            // LOG::info($envio);

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
