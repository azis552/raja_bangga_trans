<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kurir' ,
            'resi' ,
            'id_wilayah' ,
            'id_admin' ,
            'id_barang' ,
            'nama_penerima' ,
            'tlpn_penerima' ,
            'alamat_penerima' ,
            'nama_pengirim' ,
            'tlpn_pengirim' ,
            'alamat_pengirim' ,
            'total_bayar' 
    ];
}
