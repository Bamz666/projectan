<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "matkul";
    protected $primaryKey = 'id_matakuliah';
    public $timestamps = false;

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_matakuliah', 'id_matakuliah');
    }
}
