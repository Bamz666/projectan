<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "mahasiswa";
    protected $primaryKey = 'id_mahasiswa';
    public $timestamps = false;

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
