<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_pengiriman','status','tanggal'];
}
