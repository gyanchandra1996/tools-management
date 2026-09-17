<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

public function register(Request $request)
{
    $validated = $request->validate([

        'name' => 'required|string|max:100',

        'email' => [
            'required',
            'email',
            'unique:users,email'
        ],

        'mobile' => [
            'required',
            'digits:10',
            'unique:users,mobile'
        ],

        'password' => [
            'required',
            'min:8',
            'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/'
        ],

        'mechanic_level' => [
            'required',
            'in:Expert,Medium,New Recruit,Trainee'
        ],

        'picture' => [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png',
            'max:2048'
        ]
    ]);

    $picture = null;

    if ($request->hasFile('picture')) {

        $file = $request->file('picture');

        $picture = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('mechanics'), $picture);
    }

    User::create([

        'name' => $validated['name'],

        'email' => $validated['email'],

        'mobile' => $validated['mobile'],

        'password' => Hash::make(
            $validated['password']
        ),

        'picture' => $picture,

        'mechanic_level' =>
            $validated['mechanic_level'],

        'role' => 'mechanic'
    ]);

    return redirect()
        ->route('login')
        ->with(
            'success',
            'Mechanic registered successfully.'
        );
}




public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        if (auth()->user()->role === 'admin') {

            return redirect()->route(
                'admin.dashboard'
            );
        }

        return redirect()->route(
            'mechanic.dashboard'
        );
    }

    return back()->withErrors([
        'email' => 'Invalid email or password.'
    ]);
}



}