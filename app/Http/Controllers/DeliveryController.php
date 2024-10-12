<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monitor;
use App\Models\Area;
use App\Models\delivery;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $deliveries= User::where('type','delivery')->with('areas','monitors')->get();
        
        return view('layouts.Delivery.index',compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::where('type','deliverie')->get();
        $areas=Area::all();
        $monitors=monitor::all();
        return view('layouts.Delivery.create',compact('users','areas','monitors'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $validateData= $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'mobile' => 'required|unique:users',
            'area_id' => 'required|array',
            'monitors_id' => 'required|array',
            'address' => 'required|string|max:255', 
        ]);
       
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mobile' => $request->input('mobile'),
            'type' => 'delivery',
            'address' => $request->input('address'),
            'notes'=>null,
            'packarge_id'=>null,
            'Expire'=>null,
            'active'=>true,
            'area_id'=>null,
           
            
        ]);
       if(isset($validateData['monitors_id'])&&isset($validateData['area_id'])){
        foreach($validateData['monitors_id']as $monitors_id){
            foreach($validateData['area_id']as $area_id){
                delivery::create([
                    'user_id' =>$user->id,
                    'area_id' =>$area_id,
                    'monitors_id' =>$monitors_id,
            
        ]);
            }
        }
       }
          
    
        return redirect('home/deliveries')->with('success','you added a delivery!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(delivery $delivery)
    {
        //
        
        $areas = Area::all();
        $monitors = monitor::with('user')->get();
        
        return view('layouts.Delivery.edit',compact('delivery','areas','monitors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,delivery $delivery)
    {
        //
       $request->validate(
            [
                'name'=> 'required|string',
                'email'=>'required|email|unique:,user,email'.$delivery->user,
                'mobile'=>'required|digits_between:10,11|unique:users,mobile'.$delivery->user_id ,
                'password'=>'nullable|string|min:8',
                'monitors_id'=>'required|exists:monitors,id',
                'area_id'=> 'required|exists:areas,id'
            ]
            );
            $user=$delivery->user;
            $user->update(
                [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'mobile'=>$request->mobile,
                    'password'=>$request->password ? Hash::make($request->password) :$user->password,
                    
                ]
                );
            $delivery->update([
                'area_id'=>$request->area_id,
                'monitors_id'=>$request->monitors_id
            ]);
            return redirect('home/deliveries')->with('success','you edit a delivery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
