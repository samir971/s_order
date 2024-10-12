<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'content','quantity','price','total','delivery_id','order_id'
    ];
    public function delivery()
    {
        return $this->belongsTo(delivery::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
