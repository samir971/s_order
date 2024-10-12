<?php

namespace App\Models;

use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title','city_id'
    ];
    public function users()
    {

        return $this->belongsToMany(User::class,'monitors','area_id','user_id');
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function deliverie()
    {
        return $this->hasMany(delivery::class);
    }
    public function monitor()
    {
        return $this->hasMany(Monitor::class,);
    }
}
