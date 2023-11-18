<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'MataKuliah';

    // Specify the primary key column name
    protected $primaryKey = 'IDMK';
    protected $fillable = ['IDMK', 'NamaMK','SKS','user_id'];
}
