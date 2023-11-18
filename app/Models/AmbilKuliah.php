<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbilKuliah extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'AmbilKuliah';
    protected $primaryKey = ['NRP', 'IDMK'];
    protected $fillable = ['NRP', 'IDMK', 'NilaiAngka', 'NilaiHuruf'];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'IDMK');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NRP');
    }
}

