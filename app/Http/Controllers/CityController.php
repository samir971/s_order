<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Area;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities=City::all();
     return view('layouts.City.index',['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.City.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $title=request()->title;
        City::create(['title'=>$title]);

        return redirect('home/cities')->with('success','you added a city!');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $city=City::findOrFail($id);
        $areas=$city->area;
        return view('layouts.City.area',compact('city','areas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('layouts.City.edit',['city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
        'title'=>'required|string|max:255'
       ]);
        $title=request()->title;
        $city=City::findOrFail($id);
        $city->update([
            'title'=>$request->title
        ]);
           
           return redirect('/home/cities')->with('success','you edit a city!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
