<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "nilai";
    protected $primaryKey = 'id_nilai';
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matakuliah', 'id_matakuliah');
    }
}
