<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'type'=>$this->type,
            'area_id'=>$this->area_id,
            'package_id'=>$this->package_id,
            'Expire'=>$this->Expire,
            'active'=>$this->active,
            'address'=>$this->address,
            'uuid'=>$this->uuid,
            
    ];
    }
}
