<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = "points";

    protected $fillable = [
        'event_id',
        'count'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
