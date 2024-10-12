<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=User::where('type','user')->get();
        $area = Area::all();
        $package=Package::all();
        
        return view('layouts.User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $packages=Package::all();
        $areas=Area::all();
        return view('layouts.User.create',compact('packages','areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
       $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email',
            'password'=>'required|string|min:8',
            'mobile'=>'required|string',
            'address'=>'required|string',
            'notes'=>'nullable|string',
            'package_id'=>'nullable|integer|exists:packages,id',
            'area_id'=>'nullable|integer|exists:areas,id'

        ]);

        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'notes'=>$request->input('notes'),
            'package_id'=>$request->input('package_id'),
            'area_id'=>$request->input('area_id'),
            'type'=>'user',
            'Expire'=>null,
            'active'=>true
        ]);
        return redirect('home/customers')->with('success','you added a new customer');
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
    public function edit(User $user)
    {
        //
        $packages=Package::all();
        $areas=Area::all();
        return view('layouts.User.edit',compact('user','packages','areas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email',
            'password'=>'required|string|min:8',
            'mobile'=>'required|string',
            'address'=>'required|string',
            'notes'=>'nullable|string',
            'package_id'=>'nullable|integer|exists:packages,id',
            'area_id'=>'nullable|integer|exists:areas,id'
            

        ]);
        $user=User::where('type','user')->findOrFail($id);
        $user->update(
            [
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
                'mobile'=>$request->input('mobile'),
                'address'=>$request->input('address'),
                'notes'=>$request->input('notes'),
                'package_id'=>$request->input('package_id'),
                'area_id'=>$request->input('area_id')
            ]
            );
            return redirect('home/customers')->with('success','you editing a customer');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
    {
        $query= User::query();
        if($request->filled('email')){
            $query->where('email','like', '%'.$request->email.'%');
        }
        if($request->filled('mobile')){
            $query->where('mobile','like','%'.$request->mobile . '%');
        }
        if($request->filled('name')){
            $request->where('name','like','%'.$request->name . '%');
        }
      $users=$query->get();
      return view('');
    }
}
