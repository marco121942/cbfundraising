<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winer extends Model
{
    use HasFactory;

    protected $table = "winers";

    protected $fillable = [
        'id',
        'user_id',
        'partner_id',
        'premio',
        'slug_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }
}
