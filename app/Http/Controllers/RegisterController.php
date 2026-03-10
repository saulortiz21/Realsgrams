<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    use ValidatesRequests; 
    public function index() 
    {
        return view('auth.Register');
    }
    
    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|min:5',
            'username' => 'required|unique:users|min:5|max:20',
            'email' => 'required|unique:users|email|min:5|max:60',
            'password' => 'required|confirmed|min:6'
        ]); 
        
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        //Auth::attempt([
        //    'email' => $request->email,
        //    'password' => $request->password,
        //]);

        Auth::login($user);

        return redirect()->route('posts.index', $user);
        
    }
} 