<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = "messages";

    protected $fillable = [
        'remitter_id',
        'receiver_id',
        'title',
        'image',
        'body',
        'view',
        'deleted_remitter',
        'deleted_receiver',
    ];    

    public function user_remitter()
    {
        return $this->belongsTo('App\Models\User', 'id', 'remitter_id');
    }

    public function user_receiver()
    {
        return $this->belongsTo('App\Models\User', 'id', 'receiver_id');
    }
    
}
