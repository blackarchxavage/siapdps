<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);
        $remember = $request->remember_token;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('login');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$nominatif = Login::all();
        return view('admin.login'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
