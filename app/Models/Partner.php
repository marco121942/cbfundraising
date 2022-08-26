<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = "partners";

    protected $fillable = [
        'id',
        'event_id',
        'user_id',
        'name',
        'body',
        'link',
        'image',
        'gifcard1',
        'gifcard2',
        'gifcard3',
        'cupon1',
        'cupon2',
        'cupon3',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function winers()
    {
        return $this->hasMany('App\Models\Winer');
    }
}
