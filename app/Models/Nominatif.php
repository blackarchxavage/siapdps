<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nominatif extends Model
{
    use HasFactory;
    protected $table = 'biodata';
    protected $primaryKey = 'id';

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
