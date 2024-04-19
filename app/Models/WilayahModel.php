<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahModel extends Model
{
    use HasFactory;

    protected $fillable = ['id_wilayah','nama_wilayah','estimasi'];
}
