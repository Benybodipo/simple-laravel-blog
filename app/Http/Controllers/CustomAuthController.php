<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use App\Models\Category;

class CustomAuthController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('auth.login')->with(compact('categories'));
    }
    
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->except('_token');

        if (auth()->attempt($credentials))
        {
            return redirect()->route('post.index');
        }

        session()->flash('message', 'Invalid email or password');
        return redirect()->route('login');
    }

    public function registration()
    {
        $categories = Category::all();
        return view('auth.registration')->with(compact('categories'));
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data);

        return redirect()->route('post.index');

    }

    public function logout()
    {
        Session::flush();
        \Auth::logout();
  
        return redirect()->route('post.index');
    }

}
