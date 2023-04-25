<?php

namespace App\Http\Controllers;

use App\Models\Nominatif;
use Illuminate\Http\Request;

class NominatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nominatif = Nominatif::all();
        return view('admin.nominatif', compact('nominatif'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Nominatif $nominatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nominatif $nominatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nominatif $nominatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nominatif $nominatif)
    {
        return $nominatif;
    }
}
