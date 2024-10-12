<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\monitor;


class delivery extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id','area_id','monitors_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,);
    }
    public function area()
    {
        return $this->belongsTo(Area::class,);
    }
    public function monitors()
    {
        return $this->belongsTo(monitor::class,);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
    
  
}
