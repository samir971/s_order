<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\City;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $areas=Area::with('city')->get();
        return view('layouts.Area.index',['areas'=>$areas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cities=City::all();
        return view('layouts.Area.create',['cities'=>$cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required|string|max:255',
            'city_id'=>'required|exists:cities,id'
        ]);
        Area::create($request->all());
        return redirect('home/areas')->with('success','you added a area!');
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
    public function edit(Area $area)
    {
        //
        $cities=City::all();
        return view('layouts.Area.edit',['area'=>$area,'cities'=>$cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        //
        $request->validate([
            'title'=>'required|string|max:255',
            'city_id'=>'required|exists:cities,id'
        ]);
        $area->update($request->all());
        return redirect('home/areas')->with('success','you edit a area!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
