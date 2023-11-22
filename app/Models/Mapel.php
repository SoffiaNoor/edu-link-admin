<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'Dosen';

    // Specify the primary key column name
    protected $primaryKey = 'IDDosen';
    protected $fillable = ['IDDosen', 'NamaDosen','Alamat'];
}

