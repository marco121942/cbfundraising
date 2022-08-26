<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = "donations";

    protected $fillable = [
        'event_id',
        'user_id',
        'ticket',
        'count',
        'playeds',
        'money',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket')->withTimestamps();
    }
}
