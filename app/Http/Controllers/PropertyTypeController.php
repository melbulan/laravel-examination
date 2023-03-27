<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePropertyTypeRequest;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $propertyTypes = PropertyType::latest()->paginate(10);
        return view('property-types.index', compact('propertyTypes'))
        ->with('i', (request()->input('page', 1) - 1) * 10);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyTypeRequest $request)
    {
        $propertyType = PropertyType::create($request->all());
        return redirect()->route('property-types.show', $propertyType->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propertyType = PropertyType::find($id);
        return view('property-types.show', compact('propertyType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propertyType = PropertyType::find($id);
        return view('property-types.edit', compact('propertyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $propertyType = PropertyType::find($id);
        $propertyType->update($request->all());
        return redirect()->route('property-types.show', $propertyType->id)
        ->with('success','Property type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propertyType = PropertyType::find($id);
        $propertyType->delete();
        return redirect()->route('property-types.index')
            ->with('success','Property type deleted successfully');
    }
}
