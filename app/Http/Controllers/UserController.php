<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function register()
    {
        return view('register',[
            'title' => 'Register',
        ]);
    }

    public function registerAccount(Request $request)
    {
        //Validasi data
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $request['password'] = bcrypt($request['password']);

       User::create($request->all());

       return redirect('/')->with('success', 'Registration successfull! Please login');

    }


    //Login
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => 'Email ini belum tersedia',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('success', 'Login Success!');
        }
        
        return back()->with('LoginError', 'Login failed!');
    }
    
    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken(); 

        return redirect('/');
    }
}
