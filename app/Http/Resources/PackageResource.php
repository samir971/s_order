<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'image'=>$this->image,
            'count_of_order'=>$this->count_of_order,
            'package_price'=>$this->package_price,
            'order_price'=>$this->order_price
        ];
    }
}
