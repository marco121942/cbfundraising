<?php

namespace App\Models;

use App\Models\Success;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = "notifications";

    protected $fillable = [
        'user_id',
        'receiver_id',
        'event_id',
        'success',
        'view',
        'deleted_receiver',
    ];

    public function getConsuccessAttribute()
    {
        $suceso = $this->success ? $this->success : 1;
        return Success::find($suceso)->type;
        
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function user_receiver()
    {
        return $this->belongsTo('App\Models\User', 'id', 'receiver_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function success()
    {
        return $this->belongsToMany('App\Models\Success')->withTimestamps();
    }

}
