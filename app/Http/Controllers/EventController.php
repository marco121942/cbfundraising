<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\EventCreate;
use Illuminate\Support\Facades\Mail;

use App\Models\Event;
use App\Models\Notification;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;


class EventController extends Controller
{
    protected $eventImage1;
    protected $title1;
    protected $description1;
    protected $title2;
    protected $description2;
    protected $title3;
    protected $description3;
    protected $duration;
    protected $evento;
    
    public function __construct()
    {
        $this->eventImage1 = [];
        $this->title1 = null;
        $this->description1 = null;
        $this->title2 = null;
        $this->description2 = null;
        $this->title3 = null;
        $this->description3 = null;
        $this->duration = null;
        $this->evento = null;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCosa(Request $request)
    {
        $request->validate([
            'title1' => 'required',
            'description1' => 'required',
        ]);

        $this->eventImage1 = $request->file('eventImage1');
        $this->title1 = $request->title1 ? $request->title1 : '';
        $this->description1 = $request->description1 ? $request->description1 : '';
        $this->title2 = $request->title2 ? $request->title2 : '';
        $this->description2 = $request->description2 ? $request->description2 : '';
        $this->title3 = $request->title3 ? $request->title3 : '';
        $this->description3 = $request->description3 ? $request->description3 : '';
        // $this->duration = $request->duration ? $request->duration : null;
        // $this->evento = $request->evento ? $request->evento : null;

    }

    public function store(Request $request)
    {
        $this->evento = Event::where('user_id', Auth::user()->id)->first();

        function existe($posicion,$eventImage1)
        {
          if (array_key_exists($posicion,$eventImage1)) {
            return $eventImage1[$posicion];
          }else{
            return null;
          };
        }

        function slug($title1,$valor)
        {
            $unidad = $valor ?? null;

            $valorAleatorio = uniqid();
            $slug = Str::of($title1)->slug($title1,"-")->limit(255 - mb_strlen($valorAleatorio) - 1, "")->trim("-")->append("-", $valorAleatorio).Str::of($unidad);

            Log::info('un slug');
            Log::info($slug ?? 'no hay evento');
            Log::info('cierro slug');

            return $slug;
        }
        
        if ($this->evento) {
            $this->eventImage1 = $request->file('eventImage1') ? $request->file('eventImage1') : [];
            $this->title1 = $request->title1 ? $request->title1 : $this->evento->title1;
            $this->description1 = $request->description1 ? $request->description1 : $this->evento->description1;
            $this->title2 = $request->title2 ? $request->title2 : $this->evento->title2;
            $this->description2 = $request->description2 ? $request->description2 : $this->evento->description2;
            $this->title3 = $request->title3 ? $request->title3 : $this->evento->title3;
            $this->description3 = $request->description3 ? $request->description3 : $this->evento->description3;
            $this->duration = $this->evento->duration;
        }else{
            $request->validate([
                'title1' => 'required',
                'description1' => 'required',
            ]);
            $this->title1 = $request->title1 ? $request->title1 : '';
            $this->description1 = $request->description1 ? $request->description1 : '';

            $this->eventImage1 = $request->file('eventImage1') ? $request->file('eventImage1') : [];

            $objetos = [];
            $reglas = [];

            $objetos['Image'] = existe(0,$this->eventImage1);
            $reglas['Image'] = 'required|mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence,heif,heic';

            foreach($this->eventImage1 as $key => $val)
            {
                if ($key > 0) {
                    $objetos['Image '.$key] = existe($key,$this->eventImage1);
                    $reglas['Image '.$key] = 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence,heif,heic';
                }
            }
            
            $validator = Validator::make(
                $objetos,
                $reglas,
                [
                    'required' => 'The Event Image field is required',
                    'mimes' => 'There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif'
                ],
            )->validate();

            $this->title2 = $request->title2 ? $request->title2 : '';
            $this->description2 = $request->description2 ? $request->description2 : '';
            $this->title3 = $request->title3 ? $request->title3 : '';
            $this->description3 = $request->description3 ? $request->description3 : '';
            $this->duration = 30;
        }

        Log::info('desde save');

        if($this->evento){
            Log::info('desde save evento no es null');

            if (array_key_exists(0,$this->eventImage1)) {
                // $storedImage1 = $this->eventImage1[0]->storeAs('public/eventImage', Str::substr($this->evento->eventImage1, 19));
                $name = 'eventImage/'. Str::substr($this->evento->eventImage1, 19);
                $img = Image::make($this->eventImage1[0])->encode('jpg', 75);
                $img->adaptiveResizeImage(1024,768);
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
                $img2->resizeCanvas(1024, 540, 'center', false, '808080');
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
                $img3->resizeCanvas(1024, 540, 'center', false, '808080');
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
            // $img -> resizeCanvas(1024, 540, 'center', false, '808080');
            if (array_key_exists(0,$this->eventImage1)) {
                // $extencion1 = $this->eventImage1[0]->getClientOriginalExtension();
                // $storedImage1 = $this->eventImage1[0]->storeAs('public/eventImage', slug($this->title1,1).'.'.$extencion1);
                // $ruta1 = 'storage/' . Str::substr($storedImage1, 7);
                $name = 'eventImage/'. slug($this->title1,1).'.'.'jpg';
                $img = Image::make($this->eventImage1[0])->encode('jpg', 75);
                $img->adaptiveResizeImage(1024,768);
                $img->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img->save(public_path('storage/'). $name);

                $ruta1 = 'storage/' . $name;
            };

            if (array_key_exists(1,$this->eventImage1)) {
                // $extencion2 = $this->eventImage1[1]->getClientOriginalExtension();
                // $storedImage2 = $this->eventImage1[1]->storeAs('public/eventImage', slug($this->title1,2).'.'.$extencion2);
                // $ruta2 = 'storage/' . Str::substr($storedImage2, 7);
                $name = 'eventImage/'. slug($this->title1,2).'.'.'jpg';
                $img2 = Image::make($this->eventImage1[1])->encode('jpg', 75);
                $img2->resizeCanvas(1024, 540, 'center', false, '808080');
                $img2->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img2->save(public_path('storage/'). $name);

                $ruta2 = 'storage/' . $name;
            }else{
                $ruta2 = $ruta1;
            };

            if (array_key_exists(2,$this->eventImage1)) {
                // $extencion3 = $this->eventImage1[2]->getClientOriginalExtension();
                // $storedImage3 = $this->eventImage1[2]->storeAs('public/eventImage', slug($this->title1,3).'.'.$extencion3);
                // $ruta3 = 'storage/' . Str::substr($storedImage3, 7);
                $name = 'eventImage/'. slug($this->title1,3).'.'.'jpg';
                $img3 = Image::make($this->eventImage1[2])->encode('jpg', 75);
                $img3->resizeCanvas(1024, 540, 'center', false, '808080');
                $img3->insert(public_path('assets/img/android-icon-72x72.png'), 'bottom-right', 10, 10);
                $img3->save(public_path('storage/'). $name);

                $ruta3 = 'storage/' . $name;
            }else{
                $ruta3 = $ruta1;
            };
            
            $eventoNuevo = Event::create([
                'user_id' => Auth::user()->id,
                'slug' => slug($this->title1,0),
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
            $enlace = url('/event') . '/' . slug($this->title1,0);

            // $envio = Mail::to(Auth::user()->email)
            //         ->send( new EventCreate(
            //             $userName, $enlace
            //         ) );

            // LOG::info('$envio');
            // LOG::info($envio);

            session()->flash('message', 'successfully created event.');
            
        }

      // $this->mount();
      return redirect('/editevent');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
