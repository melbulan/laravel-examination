<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePropertyRequest;
use Spatie\Geocoder\Facades\Geocoder;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $properties = Property::latest()->paginate(5);
        return view('properties.index', compact('properties'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = PropertyType::all();
        return view('properties.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyRequest $request)
    {
        
        $fullAddress = $request->address_line_1.' '.$request->address_line_1.' '.$request->city.' '.$request->county.' '.$request->postcode;
        $geocode = Geocoder::getCoordinatesForAddress($fullAddress);
        
        $property = new Property();
        $property->name = $request->name;
        $property->bedrooms = $request->bedrooms;
        $property->slug = $request->slug;
        $property->bathrooms = $request->bathrooms;
        $property->size = $request->size;
        $property->description = $request->description;
        $property->council_tax_band = $request->council_tax_band;
        $property->price = $request->price;
        $property->tenure = $request->tenure;
        $property->property_type_id = $request->property_type_id;
        $property->save();


        $address = new Address();
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->city = $request->city;
        $address->county = $request->county;
        $address->postcode = $request->postcode;
        $address->latitude = $geocode['lat'];
        $address->longitude = $geocode['lng'];

        $property->address()->save($address);

        if ($request->hasFile('images')) {
            $fileAdders = $property->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('media');
                });
        }
        
        return redirect()->route('properties.show', $property->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with('propertyType')->find($id);
        $address = $property->address;
        
        return view('properties.show', compact('property','address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = PropertyType::all();
        $property = Property::find($id);
        return view('properties.edit', compact('property','types'));
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
        $property = Property::find($id);
        $property->update($request->all());
        return redirect()->route('properties.show', $property->id)
        ->with('success','Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect()->route('properties.index')
        ->with('success','Property deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDetails()
    {
        
        $properties = Cache::remember('properties', 3600, function () {
            return Property::with(['address', 'propertyType'])->get();
        });

        return PropertyResource::collection($properties);
        
    }
}
