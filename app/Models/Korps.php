<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korps extends Model
{
    use HasFactory;
    protected $table = 'korps';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
