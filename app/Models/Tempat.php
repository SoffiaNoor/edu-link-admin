<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'Tempat';
    protected $primaryKey = ['IDRuang','IDMK'];
    protected $fillable = ['IDRuang','IDMK','jam_mulai','jam_selesai'];

    public function tempatMK(){
        return $this->belongsTo(MataKuliah::class,'IDMK');
    }

    public function ruang(){
        return $this->belongsTo(Ruang::class,'IDRuang');
    }
}
