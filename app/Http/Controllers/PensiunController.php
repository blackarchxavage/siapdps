<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Pensiun;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PensiunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$filter = $request->kategori;
        //$filter = $request->filter_sumber;

        if($request->get('filter_kategori')){
            $checked = $_GET['filter_kategori'];
            $biodata = Biodata::whereIn('kategori_id', $checked)->get();
        } else {
            $biodata = Biodata::all();
        }


        return view('admin.pensiun', compact('biodata'));
    }

    // public function filter(Request $request)
    // {
    //     $value = $request->kategori;
    //     if($request->kategori){
    //         $biodata = Biodata::where('kategori_id', $value)->get();
            
            
    //     } else {
    //         $biodata = Biodata::all();
    //     }
        
    //     //return view('admin.pensiun', compact('biodata'));
    //     return view('admin.pensiun')->with('biodata', $biodata)->with('filtered',$value);
    // }

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
    public function show(Pensiun $pensiun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pensiun $pensiun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pensiun $pensiun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pensiun $pensiun)
    {
        //
    }
}
