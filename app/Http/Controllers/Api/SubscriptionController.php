<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    //
    use GeneralTrait;
    public function subscribe(Request  $request){
        $validatedData=Validator::make($request->all(),[
            'package_id'=>'required|exists:packages,id'
        ]);
        if ($validatedData->fails()){
            return $this->apiResponse(null,false,$validatedData->errors()->first(),400);
        }
        $user = $request->user();
        $package= Package::findOrFail($request->package_id);
       $user->package_id=$package->id;
       $user->active=true;
       $user->subscription_fees=$package->count_of_order;
       $user->save();
        return response()->json([
            'massage'=>'subscription successful!',
            'user'=>$user
        ],200);
    }
}
