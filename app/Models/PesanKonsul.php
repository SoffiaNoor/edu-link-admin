<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'Mahasiswa';
    protected $primaryKey = 'NRP';
    protected $fillable = ['NRP', 'NamaMhs', 'Alamat', 'IDDosen', 'IPK', 'JenisKelamin'];
    public function dosenWali()
    {
        return $this->belongsTo(Dosen::class, 'IDDosen');
    }
}