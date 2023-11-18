<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'AuditMK';

    // Specify the primary key column name
    protected $primaryKey = 'ID';
    protected $fillable = ['ID', 'IDMK','SKS_New','SKS_Old','NamaMK_New', 'NamaMK_Old','Date', 'users'];
}
