<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'Ruang';

    // Specify the primary key column name
    protected $primaryKey = 'IDRuang';
    protected $fillable = ['IDRuang', 'NamaRuang','Kapasitas'];
}
