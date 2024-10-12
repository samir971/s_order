<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Traits\Uuid;
use App\Models\monitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

                

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
    use Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile','package_id','profile_image',
        'address','notes','area_id','uuid','type'
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function areas()
    {
      return $this->belongsToMany(Area::class,'monitors','user_id','area_id');
    }
    public function area()
    {
      return $this->belongsTo(Area::class);
    }
    public function package()
    {
      return $this->belongsTo(Package::class);
    }
    public function ContactUs()
    {
      return $this->hasMany(ContactUs::class);
     }
     public function deliverie()
     {
      return $this->hasMany(delivery::class,);
     }
     public function customerToken()
     {
        return $this->hasOne(CustomerToken::class);
     }
     public function monitors()
     {
        return $this->hasMany(monitor::class);
     }
     public function adminNotification()
     {
        return $this->hasMany(AdminNotification::class);
     }
     public function order()
     {
        return $this->hasMany(Order::class);
     }
     public function userNotification()
     {
        return $this->hasMany(UserNotification::class);
     }
    
}
