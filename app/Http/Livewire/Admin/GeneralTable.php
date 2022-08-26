<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GeneralTable extends Component
{
    public $users;

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User deleted.');
        $this->mount();
    }
    
    public function mount()
    {
        $this->users = User::get()
        ->filter(function ($user){
            return $user->hasRole('org');
        });
        //LOG::info($this->users);
    }

    public function render()
    {
        return view('livewire.admin.general-table');
    }
}
