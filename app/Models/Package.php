<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title','image','count_of_orders','packege_price','order_price'
    ];
    public function user()
    {
        return $this->hasMany(User::class,'package_id');
    }
    
}
