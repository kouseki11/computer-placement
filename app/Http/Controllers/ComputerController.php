<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;
use App\Models\Brand;

class ComputerController extends Controller
{
    public function index(){
        $title = '';
        if(request('room')){
            $room = Room::firstWhere('slug', request('room'));
            $title = ' in ' . $room->name;
        }

        if(request('brand')){
            $brand = Brand::firstWhere('slug', request('brand'));
            $title = ' in ' . $brand->name;
        }

        return view('index', [
            "title" => "All Computer" . $title,
            'count' => "Computer" . $title,
            "active" => 'computers',
            'brands' => Brand::all(),
            "computers" => Computer::where('status', 'New')->orWhere('status','Repaired')->oldest()->filter(request(['room', 'brand']))->paginate(50)->withQueryString(),
        ]);

    }

    public function broken()
    {
        $title = '';
        if(request('room')){
            $room = Room::firstWhere('slug', request('room'));
            $title = ' in ' . $room->name;
        }

        if(request('brand')){
            $brand = Brand::firstWhere('slug', request('brand'));
            $title = ' in ' . $brand->name;
        }

        return view('broken',[
            'title' => 'All Broken Computer' . $title,
            'count' => "Broken Computer" . $title,
            "active" => 'computers',
            "computers" => Computer::where('status','Broken')->oldest()->filter(request(['room', 'brand']))->paginate(6)->withQueryString(),
        ]);
    }

    public function brokenComputer($id)
    {
        $computer = Computer::where('id', $id)->update(
            [
                'status' => 'Broken',
                'broken_time' => now()
            ]
        );
        if($computer) {
            return redirect()->route('home')->with('updated',"negro");
        }else{
            return redirect()->route('home')->with('error',"negro");
        }
    }

    public function repaired($id)
    {
        $computer = Computer::where('id', $id)->update(
            [
                'status' => 'Repaired',
                'repaired_time' => now(),
            ]
        );
        if($computer) {
            return redirect()->route('broken')->with('updated',"negro");
        }else{
            return redirect()->route('broken')->with('error',"negro");
        }
    }
}
