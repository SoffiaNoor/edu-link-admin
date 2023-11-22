<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $table = 'mentor';

    protected $fillable = ["namamentor", "pendidikan", "ptn", "idbidang"];

    // public function bidang() {
    //     return $this->belongsTo(Bidang ::class, 'idbidang');
    // }
}
