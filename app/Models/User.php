<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Notifications\MyResetPassword;

/*
* -- Cashier
*/

use Laravel\Cashier\Billable;

/*
* -- Permission
*/
use Spatie\Permission\Traits\HasRoles;
/*
* -- Permission
*/

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /*
    * -- Permission
    */
    use HasRoles;
    /*
    * -- Permission
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'paypal_email',
        'photo',
        'about',
        'company',
        'job',
        'country',
        'address',
        'phone',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function events()
    {
      return $this->hasMany('App\Models\Event');
    }
    
    public function partners()
    {
      return $this->hasMany('App\Models\Partner');
    }

    public function winers()
    {
      return $this->hasMany('App\Models\Winer');
    }

    public function sms_remitted()
    {
      return $this->hasMany('App\Models\Message', 'remitter_id');
    }

    public function sms_received()
    {
      return $this->hasMany('App\Models\Message', 'receiver_id');
    }

    public function notifications_receiver()
    {
      return $this->hasMany('App\Models\Notification', 'receiver_id');
    }

    public function donations()
    {
      return $this->hasMany('App\Models\Donation');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }
}
