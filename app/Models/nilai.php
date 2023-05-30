<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table='nilai';

    function getMataKuliah(){
        return $this->BelongsTo(Mata::class);
    }

    function getMahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
