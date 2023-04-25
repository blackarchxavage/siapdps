<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:4|max:18',
            'username' => ['required','min:5','max:18', 'unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Nama minimal 5 karakter',
            'nama.max' => 'Nama maksimal 18 karakter',
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 5 karakter',
            'username.max' => 'Username maksimal 18 karakter',
            'username.unique' => 'Username sudah terdaftar!',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid! example@gmail.com',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 5 karakter',
            'password.max' => 'Password maksimal 20 karakter'
        ]); 

        //$validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        Users::create($validateData);
        
        
        
        return redirect('login')->with('success', ' Silahkan login!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        //
    }
}
