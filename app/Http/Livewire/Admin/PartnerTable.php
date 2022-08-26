<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Partner;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

//---------------


/*
* -- Permission
*/
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/*
* -- Permission
*/

class PartnerTable extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $users;

    public $userName, $partnerName, $email, $phone, $body, $link;

    public $image, $gifcard1, $gifcard2, $gifcard3, $cupon1, $cupon2, $cupon3;

    public $user_id, $partner_id;
    
    public $isModalOpen = 0;

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->resetCreateForm();
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->partner_id = null;
        $this->user_id = null;
        $this->userName = null;
        $this->partnerName = null;
        $this->email = null;
        $this->phone = null;
        $this->body = null;
        $this->link = null;
    }

    public function existe($imagen)
    {
      if (isset($imagen)) {
        return $imagen;
      }else{
        return null;
      };
    }

    public function store()
    {
        $this->validate([
            'userName' => 'required',
            'email' =>'required',
            'phone' =>'required',
            'partnerName' =>'required',
            'body' =>'required',
            'link' =>'required',
        ]);

        // --------------------
/*
        Validator::make(
            ['image' => $this->existe($this->image)],  //$this->image ? $this->image : null
            ['image' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240'],
            // ['image' => 'required'],
            // ['required' => 'The :attribute field is required'],
        )->validate();

        // --------------------

        Validator::make(
            ['gifcard1' => $this->existe($this->gifcard1)],
            ['gifcard1' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240'],
            // ['gifcard1' => 'required'],
            // ['required' => 'The :attribute field is required'],
        )->validate();

        Validator::make(
            ['gifcard2' => $this->existe($this->gifcard2)],
            ['gifcard2' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240'],
            // ['gifcard2' => 'required'],
            // ['required' => 'The :attribute field is required'],
        )->validate();

        Validator::make(
            ['gifcard3' => $this->existe($this->gifcard3)],
            ['gifcard3' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240'],
            // ['gifcard3' => 'required'],
            // ['required' => 'The :attribute field is required'],
        )->validate();

        //------------------

        Validator::make(
            ['cupon1' => $this->existe($this->cupon1)],
            ['cupon1' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240'],
            // ['cupon1' => 'required'],
            // ['required' => 'The :attribute field is required'],
        )->validate();

        Validator::make(
            ['cupon2' => $this->existe($this->cupon2)],
            ['cupon2' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240'],
            // ['cupon2' => 'required'],
            // ['required' => 'The :attribute field is required'],
        )->validate();

        Validator::make(
            ['cupon3' => $this->existe($this->cupon3)],
            ['cupon3' => 'mimes:jpeg,png,jpg,gif,svg,image/heif,image/heic,image/heif-sequence,image/heic-sequence|max:10240'],
            // ['cupon3' => 'required'],
            // ['required' => 'The :attribute field is required'],
        )->validate();
*/

        // -----------------------
        
        if (isset($this->user_id)) {

            $user = User::updateOrCreate([
                'id' => $this->user_id,
            ], [
                'name' => $this->userName,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $partner = $user->partners()->updateOrCreate([
                'id' => $this->partner_id,
            ], [
                'name' => $this->partnerName,
                'body' => $this->body,
                'link' => $this->link,
                'event_id' => 0,
            ]);
        }else{
            
            $user = User::create([
                'password' => bcrypt('123456'),
                'name' => $this->userName,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $partner = $user->partners()->create([
                'name' => $this->partnerName,
                'body' => $this->body,
                'link' => $this->link,
                'event_id' => 0,
            ]);
            $user->assignRole('partner');

        }

                // imagenes
        //----------------------------------
            if (isset($this->image)) {
                $extencion1 = $this->image->getClientOriginalExtension();
                $storedImage1 = $this->image->storeAs('public/partners/image', $this->partnerName.'.'.$extencion1);
                $ruta1 = 'storage/' . Str::substr($storedImage1, 7);

                $partner->update([
                    'image' => $ruta1,
                ]);
            };
            // gifcard
            if (isset($this->gifcard1)) {
                $extencion2 = $this->gifcard1->getClientOriginalExtension();
                $storedImage2 = $this->gifcard1->storeAs('public/partners/gifcard', $this->partnerName.'Gifcard1.'.$extencion2);
                $ruta2 = 'storage/' . Str::substr($storedImage2, 7);

                $partner->update([
                    'gifcard1' => $ruta2,
                ]);
            };
            if (isset($this->gifcard2)) {
                $extencion3 = $this->gifcard2->getClientOriginalExtension();
                $storedImage3 = $this->gifcard2->storeAs('public/partners/gifcard', $this->partnerName.'Gifcard2.'.$extencion3);
                $ruta3 = 'storage/' . Str::substr($storedImage3, 7);

                $partner->update([
                    'gifcard2' => $ruta3,
                ]);

            };
            if (isset($this->gifcard3)) {
                $extencion4 = $this->gifcard3->getClientOriginalExtension();
                $storedImage4 = $this->gifcard3->storeAs('public/partners/gifcard', $this->partnerName.'Gifcard3.'.$extencion4);
                $ruta4 = 'storage/' . Str::substr($storedImage4, 7);

                $partner->update([
                    'gifcard3' => $ruta4,
                ]);
            };
            // cupon
            if (isset($this->cupon1)) {
                $extencion5 = $this->cupon1->getClientOriginalExtension();
                $storedImage5 = $this->cupon1->storeAs('public/partners/cupon', $this->partnerName.'Cupon1.'.$extencion5);
                $ruta5 = 'storage/' . Str::substr($storedImage5, 7);

                $partner->update([
                    'cupon1' => $ruta5,
                ]);
            };
            if (isset($this->cupon2)) {
                $extencion6 = $this->cupon2->getClientOriginalExtension();
                $storedImage6 = $this->cupon2->storeAs('public/partners/cupon', $this->partnerName.'Cupon2.'.$extencion6);
                $ruta6 = 'storage/' . Str::substr($storedImage6, 7);

                $partner->update([
                    'cupon2' => $ruta6,
                ]);
            };
            if (isset($this->cupon3)) {
                $extencion7 = $this->cupon3->getClientOriginalExtension();
                $storedImage7 = $this->cupon3->storeAs('public/partners/cupon', $this->partnerName.'Cupon3.'.$extencion7);
                $ruta7 = 'storage/' . Str::substr($storedImage7, 7);

                $partner->update([
                    'cupon3' => $ruta7,
                ]);
            };

        //-------------------------------------

        session()->flash('message', $this->user_id ? 'Partner updated.' : 'Partner created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
        $this->mount();
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    
    public function edit($id_user, $id_partner)
    {
        $this->user_id = $id_user;
        
        if ( isset($id_partner) ) {
            $this->partner_id = $id_partner;
            $user = User::with(['partners' => function($query){
                return $query->where('id', $this->partner_id);
            }])->whereHas('partners', function($query){
                return $query->where('id', $this->partner_id);
            })->where('id', $this->user_id)
            ->first();

            $this->userName = $user->name;
            $this->partnerName = $user->partners[0]->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->body = $user->partners[0]->body;
            $this->link = $user->partners[0]->link;
        }else{
            $user = User::findOrFail($id_user);
            
            $this->userName = $user->name;
            $this->partnerName = '';
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->body = '';
            $this->link = '';
        }
            
        $this->openModalPopover();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Partner deleted.');
        $this->resetCreateForm();
        $this->mount();
    }

    public function mount()
    {
        $role = 'partner';
        $this->users = User::with('partners')
        // ->where(function($query){
        //     return $query->hasRole('org');
        // })
        ->get()
        ->filter(function ($user){
            return $user->hasRole('partner');
        });
        LOG::info($this->users);
    }
   
    public function render()
    {
        return view('livewire.admin.partner-table');
    }
}
