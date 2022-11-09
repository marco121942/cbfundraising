<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $table = "messages";

    protected $fillable = [
        'remitter_id',
        'receiver_id',
        'name',
        'email',
        'body',
        'view',
        'deleted_remitter',
        'deleted_receiver',
    ];

    public function getIsorgAttribute()
    {
        if ( isset($this->remitter_id) ) {
            $usuario = User::find($this->remitter_id);
            if ($usuario->hasRole('org')) {
                return true;
            }elseif($usuario->hasRole('admin')) {
                return true;
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function user_remitter()
    {
        return $this->belongsTo('App\Models\User', 'id', 'remitter_id');
    }

    public function user_receiver()
    {
        return $this->belongsTo('App\Models\User', 'id', 'receiver_id');
    }
    
}
