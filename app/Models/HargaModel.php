<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaModel extends Model
{
    use HasFactory;

    protected $fillable = ['id_wilayah','harga'];
}
