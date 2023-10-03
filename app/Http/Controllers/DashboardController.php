<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;
use App\Models\Brand;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
