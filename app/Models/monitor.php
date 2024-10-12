<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class monitor extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id','area_id','monitor_id'
    ];
   

    public function delivery()
    {
        return $this->hasMany(delivery::class,'monitor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function areas()
    {
        return $this->belongsTo(Area::class,'area_monitors');
    }
  
}
