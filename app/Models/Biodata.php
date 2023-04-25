<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Biodata extends Model
{
    use HasFactory;
    protected $table = 'biodata';
    protected $primaryKey = 'id'; 
    protected $guarded = [];
    // protected $fillable = [
    //     'nrp_nip',
    //     'nama',
    //     'tmp_lahir',
    //     'tgl_lahir',
    //     'kelamin_id',
    //     'agama_id',
    //     'status_id',
    //     'nama_pasangan',
    //     'phone1',
    //     'phone2',
    //     'email',
    //     'alamat_sekarang',
    //     'alamat_pensiun',
    //     'nik',
    //     'kk',
    //     'kta',
    //     'pangkat_id',
    //     'korps_id',
    //     'tmt_pangkat',
    //     'sumber_id',
    //     'tmt_sumber',
    //     'jabatan',
    //     'kategori_id',
    //     'tmt_kategori',
    //     'gaji_terakhir',
    //     'gaji_pensiun',
    //     'kta_file',
    //     'pangkat_file',
    //     'sumber_file',
    //     'foto_file',
    //     'users_id'
    // ];   

    function getVal($value) {
        if($value){
            $result = $value;
        } else {
            $result = '-';
        }
        return $result;
    }

    function getMasa($value) {
        if($value){
            $result = $value;
        } else {
            $result = '0';
        }
        return $result;
    }

    function getJK($value) {
        if($value==1){
            $result = 'L';
        } else if ($value==2) {
            $result = 'P';
        } else {
            $result = '-';
        }
        return $result;
    }
    
    public function getKorps(): BelongsTo
    {
        return $this->belongsTo(Korps::class, 'korps_id', 'id');  
    }

    public function getAgama(): BelongsTo
    {
        return $this->belongsTo(Agama::class, 'agama_id', 'id'); 
    }

    public function getKelamin(): BelongsTo
    {
        return $this->belongsTo(Kelamin::class, 'kelamin_id', 'id'); 
    }

    public function getPangkat(): BelongsTo
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id', 'id');
    }

    public function getSumber(): BelongsTo
    {
        return $this->belongsTo(Sumber::class, 'sumber_id', 'id'); 
    }

    public function getStatus(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id'); 
    }

    public function getKategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id'); 
    }
    
}
