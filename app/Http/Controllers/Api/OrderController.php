<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\GeneralTrait;

class OrderController extends Controller
{
    //
    use GeneralTrait;
    public function create(Request $request){
        $user=$request->user();
        if(!$user->active||is_null($user->package_id)){
            return response()->json([
                'massage'=>'you need to subscribe to a package first.'
            ],403);
        }
        $package=Package::findOrFail($user->package_id);
        if($package->count_of_order <=0){
            return response()->json([
                'massage'=>'you have no available order left.
                Please renew your package'
            ],403);
        }
        $validatedData=Validator::make($request->all(),[
            'order'=>'required|string',
            'address'=>'required|string',
        ]);
        if ($validatedData->fails()){
            return $this->apiResponse(null,false,$validatedData->errors()->first(),400);
        }
        $order=Order::create([
            'order' => $request->input('order'),
            'status'=>'wating',
            'address'=>$request->input('address'),
            'user_id'=>$user->id,
            'estimatedTime'=>'15-30'
            
        ]);
        $user->subscription_fees -= 1;
        $user->save();
        return response()->json([
            'massage'=>'order created successfully!',
            'order'=>$order
        ],201);
    }




    public function getWaitingOrder(){
        $user= auth()->user();
        if ($user->type !=='delivery'){
            return response()->json(['massage'=>'unauthorized.'],403);
        }
        $waitingOrders= Order::where('status','wating')->whereNotNull('user_id')
        ->whereHas('user',function($query)
        use ($user){
        $query->where('area_id',
        $user->area_id);
        })->get();
        return response()->json($waitingOrders);
    }



    public function pickOrder(Request $request,$orderId){
        $user= auth()->user();
        if($user->type !=='delivery'){
            return response()->json(['message'=>'you not have access.'],403);
        }
        $order= Order::findOrFail($orderId);
        if($order->status !== 'wating'||$order->user->area_id !==$user->area_id){
            return response()->json(['message'=>'the order is already taken'],400);
        }
        $order->status='inProgress';
        $order->delivery_id=$user->id;
        $order->startDeliveryTime=now();
        $order->save();
        return response()->json(['massage'=>'Order picked successfully!.','order'=>$order]);
    }
}
