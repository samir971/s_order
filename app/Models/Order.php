<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory,Uuid;
    protected $fillable = [
        'order','staus','uuid','delivery_id','scheduledTime','estimatedTime','address','startDeliveryTime','receivedTime','canceled','CancelTime','user_id','rate'
    ];
    public function adminNontification()
    {
        return $this->hasMany(AdminNotification::class);
    }
    public function delivery()
    {
        return $this->belongsTo(delivery::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function userNotification()
    {
        return $this->hasMany(UserNotification::class);
    }
}
