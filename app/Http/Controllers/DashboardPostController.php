<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;
use App\Models\Brand;
use Illuminate\support\Facades\Auth;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'computers' => Computer::where('user_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'no_computer' => 'required|unique:computers,no_computer',
            'brand_id' => 'required',
            'date' => 'required',
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;
        Computer::create($validatedData);

        return redirect('/dashboard/computers')->with('successAdd', 'negro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(computer $computer)
    {
        return view('dashboard.posts.show', [
            'computer' => $computer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(computer $computer)
    {
        return view('dashboard.posts.edit',[
            'computer' => $computer,
            'rooms' => Room::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, computer $computer)
    {
        $rules = [
            'name' => 'required|max:225',
            'room_id' => 'required',
            'brand_id' => 'required',
            'date' => 'required',
        ];

        if($request->no_computer != $computer->no_computer){
            $rules['no_computer'] = 'required|unique:computers';
        }

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        Computer::where('id', $computer->id)
                ->update($validatedData);

        return redirect('/dashboard/computers')->with('successEd', 'negro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(computer $computer)
    {
        Computer::destroy($computer->id);
        return redirect('/dashboard/computers')->with('successDel', 'Berhasil menghapus Computer');
    }
}
