<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $packages= Package::all();
    
        return view('layouts.Package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.Package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           'title'=>'required|string',
           'image' =>'nullable|image|mimes:png,jpg,jpeg',
           'count_of_order'=>'required|integer',
           'package_price'=>'required|numeric',
           'order_price'=>'required|numeric'
        ]);
        $package=new Package;
        $package->title=$request->input('title');
        if($request->hasFile('image')){
            $imageName=time().'.'. $request->image->extension();
            $request->image->move(public_path('images/packages'),$imageName);
            $package->image=$imageName;
        }
        $package->count_of_order=$request->input('count_of_order');
        $package->package_price=$request->input('package_price');
        $package->order_price=$request->input('order_price');
        $package->save();
        return redirect('home/packages')->with('success','you added a new package');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $package=Package::findOrFail($id);
        $users=$package->user;
        return view('layouts.Package.user',compact('package','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $package= Package::findOrFail($id);
        return view('layouts.Package.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title'=>'required|string',
            'image'=>'nullable|image|mimes:png,jpg,jpeg',
            'count_of_order'=>'required|integer',
            'package_price'=>'required|numeric',
            'order_price'=>'required|numeric'

        ]);
        $package= Package::findOrFail($id);
        $package->title=$request->input('title');
        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images/packages'),$imageName);
            $package->image=$imageName;
        }
        $package->count_of_order=$request->input('count_of_order');
        $package->package_price=$request->input('package_price');
        $package->order_price=$request->input('order_price');
        $package->save();
        return redirect('home/packages')->with('success','you added a new package');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
