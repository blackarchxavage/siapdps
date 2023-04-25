<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Requests\BiodataRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use File;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodata = Biodata::all();
        return view('admin.biodata', compact('biodata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add');
    }

     /**
     * STORE CUSTOM FUNCTION
     */
    function create_from_format($request)
    {
        if ($request): return Carbon::createFromFormat('d-m-Y', $request)->format(format:'Y-m-d'); else: return null; endif;
    }
    /**
     * Store a newly created resource in storage.
     * public function store(Request $request) 
     * public function store(BiodataRequest $request)
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nrp_nip' => 'required',
            'nama' => 'required',
            'foto_file' => 'image|file|max:5000',
            'pangkat_file' => 'mimetypes:application/pdf|file|max:5000',
            'sumber_file' => 'mimetypes:application/pdf|file|max:5000',
            'kta_file' => 'mimetypes:application/pdf|file|max:5000'
        ],[
            'required' => 'Kolom tidak boleh kosong!',
            'max:5000' => 'Ukuran file tidak lebih dari 5Mb!',
            'image' => 'Format foto harus .jpg',
            'kta_file' => 'Format file harus .pdf (Max:5Mb)',
            'pangkat_file' => 'Format file harus .pdf (Max:5Mb)',
            'sumber_file' => 'Format file harus .pdf (Max:5Mb)'
        ]);

        $validateData['nrp_nip'] = $request->nrp_nip;
        $validateData['nama'] = $request->nama;
        $validateData['tmp_lahir'] = $request->tmp_lahir; 
        $validateData['tgl_lahir'] = $this->create_from_format($request->tgl_lahir);
        // $validateData['tgl_lahir'] = $request->tgl_lahir;
        $validateData['usia'] = $request->usia;
        $validateData['kelamin_id'] = $request->kelamin_id;
        $validateData['agama_id'] = $request->agama_id;
        $validateData['status_id'] = $request->status_id;
        $validateData['nama_pasangan'] = $request->nama_pasangan;
        $validateData['phone1'] = $request->phone1;
        $validateData['email'] = $request->email;
        $validateData['alamat_sekarang'] = $request->alamat_sekarang;
        $validateData['alamat_pensiun'] = $request->alamat_pensiun;
        $validateData['nik'] = $request->nik;
        $validateData['npwp'] = $request->npwp;
        $validateData['kta'] = $request->kta;
        $validateData['bpjs'] = $request->bpjs;
        $validateData['pangkat_id'] = $request->pangkat_id;
        $validateData['korps_id'] = $request->korps_id;
        $validateData['tmt_pangkat'] = $this->create_from_format($request->tmt_pangkat);
        // $validateData['tmt_pangkat'] = $request->tmt_pangkat;
        $validateData['sumber_id'] = $request->sumber_id;
        $validateData['tmt_sumber'] = $this->create_from_format($request->tmt_sumber);
        // $validateData['tmt_sumber'] = $request->tmt_sumber;
        $validateData['jabatan'] = $request->jabatan;
        $validateData['kategori_id'] = $request->kategori_id;
        $validateData['tmt_kategori'] = $this->create_from_format($request->tmt_kategori);
        // $validateData['tmt_kategori'] = $request->tmt_kategori;
        $validateData['gaji_terakhir'] = $request->gaji_terakhir;
        $validateData['tahun_masa_kerja'] = $request->tahun_masa_kerja;
        $validateData['bulan_masa_kerja'] = $request->bulan_masa_kerja;
        $validateData['gaji_pensiun'] = $request->gaji_pensiun;

        $path = 'file/'.$request->nrp_nip;
        if($request->file('foto_file')){
            $foto = $request->file('foto_file')->extension();
            $validateData['foto_file'] = $request->file('foto_file')->storeAs($path, 'foto.'.$foto);
        }
        if($request->file('pangkat_file')){
            $pangkat = $request->file('pangkat_file')->extension();
            $validateData['pangkat_file'] = $request->file('pangkat_file')->storeAs($path, 'pangkat.'.$pangkat);
        }
        if($request->file('sumber_file')){
            $sumber = $request->file('sumber_file')->extension();
            $validateData['sumber_file'] = $request->file('sumber_file')->storeAs($path, 'sumber.'.$sumber);
        }
        if($request->file('kta_file')){
            $kta = $request->file('kta_file')->extension();
            $validateData['kta_file'] = $request->file('kta_file')->storeAs($path, 'kta.'.$kta);
        }

        //return dd($validateData);
        Biodata::create($validateData);
        return back()->with('success', 'Success! Data tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Biodata $biodata)
    {
        return view('admin.biodata', compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biodata $biodata)
    {
        
        return view('admin.edit', compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biodata $biodata)
    {
        
        $validateData = $request->validate([
            'nrp_nip' => 'required',
            'nama' => 'required',
            'foto_file' => 'image|file|max:5000',
            'pangkat_file' => 'mimetypes:application/pdf|file|max:5000',
            'sumber_file' => 'mimetypes:application/pdf|file|max:5000',
            'kta_file' => 'mimetypes:application/pdf|file|max:5000'
        ],[
            'required' => 'Kolom tidak boleh kosong!',
            'max:5000' => 'Ukuran file tidak lebih dari 5Mb!',
            'image' => 'Format foto harus .jpg',
            'kta_file' => 'Format file harus .pdf (Max:5Mb)',
            'pangkat_file' => 'Format file harus .pdf (Max:5Mb)',
            'sumber_file' => 'Format file harus .pdf (Max:5Mb)'
        ]);

        $validateData['nrp_nip'] = $request->nrp_nip;
        $validateData['nama'] = $request->nama;
        $validateData['tmp_lahir'] = $request->tmp_lahir; 
        $validateData['tgl_lahir'] = $this->create_from_format($request->tgl_lahir);
        // $validateData['tgl_lahir'] = $request->tgl_lahir;
        $validateData['usia'] = $request->usia;
        $validateData['kelamin_id'] = $request->kelamin_id;
        $validateData['agama_id'] = $request->agama_id;
        $validateData['status_id'] = $request->status_id;
        $validateData['nama_pasangan'] = $request->nama_pasangan;
        $validateData['phone1'] = $request->phone1;
        $validateData['email'] = $request->email;
        $validateData['alamat_sekarang'] = $request->alamat_sekarang;
        $validateData['alamat_pensiun'] = $request->alamat_pensiun;
        $validateData['nik'] = $request->nik;
        $validateData['npwp'] = $request->npwp;
        $validateData['kta'] = $request->kta;
        $validateData['bpjs'] = $request->bpjs;
        $validateData['pangkat_id'] = $request->pangkat_id;
        $validateData['korps_id'] = $request->korps_id;
        $validateData['tmt_pangkat'] = $this->create_from_format($request->tmt_pangkat);
        // $validateData['tmt_pangkat'] = $request->tmt_pangkat;
        $validateData['sumber_id'] = $request->sumber_id;
        $validateData['tmt_sumber'] = $this->create_from_format($request->tmt_sumber);
        // $validateData['tmt_sumber'] = $request->tmt_sumber;
        $validateData['jabatan'] = $request->jabatan;
        $validateData['kategori_id'] = $request->kategori_id;
        $validateData['tmt_kategori'] = $this->create_from_format($request->tmt_kategori);
        // $validateData['tmt_kategori'] = $request->tmt_kategori;
        $validateData['gaji_terakhir'] = $request->gaji_terakhir;
        $validateData['tahun_masa_kerja'] = $request->tahun_masa_kerja;
        $validateData['bulan_masa_kerja'] = $request->bulan_masa_kerja;
        $validateData['gaji_pensiun'] = $request->gaji_pensiun;

        $path = 'file/'.$request->nrp_nip;
        if($request->file('foto_file')){
            $foto = $request->file('foto_file')->extension();
            $validateData['foto_file'] = $request->file('foto_file')->storeAs($path, 'foto.'.$foto);
        }
        if($request->file('pangkat_file')){
            $pangkat = $request->file('pangkat_file')->extension();
            $validateData['pangkat_file'] = $request->file('pangkat_file')->storeAs($path, 'pangkat.'.$pangkat);
        }
        if($request->file('sumber_file')){
            $sumber = $request->file('sumber_file')->extension();
            $validateData['sumber_file'] = $request->file('sumber_file')->storeAs($path, 'sumber.'.$sumber);
        }
        if($request->file('kta_file')){
            $kta = $request->file('kta_file')->extension();
            $validateData['kta_file'] = $request->file('kta_file')->storeAs($path, 'kta.'.$kta);
        }

        Biodata::where('id', $biodata->id)->update($validateData);
        return redirect(url('detail/'.$biodata->id))->with('updated', 'Success! Data berhasil diupdate!');        
        // return back()->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biodata $biodata)
    {
        
        $biodata = Biodata::find($biodata->id);
        if (Storage::exists('file/'.$biodata->nrp_nip)) 
        {
            Storage::deleteDirectory('file/'.$biodata->nrp_nip);
        } 
        $biodata->delete();
        return redirect('pensiun')->with('success', 'Data sudah dihapus!');
    }

}
