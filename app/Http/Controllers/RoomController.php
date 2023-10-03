<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;
use App\Models\Brand;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.room.index', [
            'rooms' => Room::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.room.create',[
            'rooms' => Room::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreroomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225|unique:rooms',
        ]);
        
        $slug = str_replace(' ', '-',$request->name);
        
        Room::create([
            'name'=> $request->name,
            'slug'=>  Str::lower($slug),
            ]
        );

        return redirect('/dashboard/rooms')->with('successAdd', 'negro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(room $room)
    {
        return view('dashboard.rooms.show', [
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(room $room)
    {
        return view('dashboard.room.edit',[
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateroomRequest  $request
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, room $room)
    {
        $rules = [
        ];

        if($request->name != $room->name){
            $rules['name'] = 'required|unique:rooms';
        }


        $validatedData = $request->validate($rules);

        Room::where('id', $room->id)
                ->update($validatedData);

        return redirect('/dashboard/rooms')->with('successEd', 'negro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(room $room)
    {   
        //Computer::where('room',$room->id)->update
        Room::destroy($room->id);
        return redirect('/dashboard/rooms')->with('successDel', 'negro');
    }
}
