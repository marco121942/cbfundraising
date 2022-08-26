<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    use HasFactory;

    protected $table = "success";

    protected $fillable = [
        'type'
    ];

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification')->withTimestamps();
    }
}
