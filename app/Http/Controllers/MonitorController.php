<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monitor;
use App\Models\Area;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;


class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $monitors= User::where('type','monitor')->with('areas')->get();
        return view('layouts.Monitor.index',compact('monitors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::where('type','monitor')->get();
        $areas=Area::all();
        return view('layouts.Monitor.create',compact('users','areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'mobile' => 'required|unique:users',
            'area_ids' => 'required|array',
            'area_ids.*' => 'exists:areas,id',
            'address' => 'required|string|max:255', 
        ]);
        
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mobile' => $request->input('mobile'),
            'type' => 'monitor',
            'address' => $request->input('address'),
            'notes'=>null,
            'packarge_id'=>null,
            'Expire'=>null,
            'active'=>true,
            'area_id'=>null,
            
            
        ]);
      $user->areas()->attach($request->input('area_ids'));
        return redirect('home/monitors')->with('success','you added a monitor!');
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
    public function edit($id)
    {
        //
        $monitor=User::where('type','monitor')->findOrFail($id);
        $areas = Area::all();
        
        return view('layouts.Monitor.edit',compact('monitor','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
     
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8',
            'mobile' => 'required',
            'area_id' => 'required|array',
          
            'address' => 'required|string|max:255',
            
        ]);
           
 $data=[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'password'=>$request->input('password')
        
        ];
   
            
        $monitor=User::findOrFail($id);
       $monitor->update($data);
       $data=[
        'area_id'=>$request->area_id,
        'user_id'=>$request->user_id
       ];
       $monitor->areas()->sync($request->input('area_id'));
      
      
        return redirect('home/monitors')->with('success','you edit a monitor!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
