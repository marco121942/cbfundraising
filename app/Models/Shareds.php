<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shareds extends Model
{
    use HasFactory;

    protected $table = "shareds";

    protected $fillable = [
        'id',
        'event_id',
        'count'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

}
