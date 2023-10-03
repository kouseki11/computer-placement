<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.brand.index', [
            'brands' => Brand::all(),
            'computers' => Computer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.brand.create',[
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225|unique:brands',
        ]);
    
        $slug = str_replace(' ', '-',$request->name);

        Brand::create([
            'name'=> $request->name,
            'slug'=>  Str::lower($slug),
            ]
        );

        return redirect('/dashboard/brands')->with('successAdd', 'negro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        return view('dashboard.brands.show', [
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(brand $brand)
    {
        return view('dashboard.brand.edit',[
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebrandRequest  $request
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brand $brand)
    {
        $rules = [
        ];

        if($request->name != $brand->name){
            $rules['name'] = 'required|unique:brands';
        }


        $validatedData = $request->validate($rules);

       Brand::where('id', $brand->id)
                ->update($validatedData);

        return redirect('/dashboard/brands')->with('successEd', 'negro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand)
    {
        Brand::destroy($brand->id);
        return redirect('/dashboard/brands')->with('successDel', 'negro');
    }
}
