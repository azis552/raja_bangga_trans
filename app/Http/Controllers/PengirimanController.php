<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\HargaModel;
use App\Models\PengirimanModel;
use App\Models\User;
use App\Models\WilayahModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = PengirimanModel::join('Wilayah_models','Pengiriman_models.id_wilayah','=','wilayah_models.id_wilayah')
                            ->select('Pengiriman_models.*','Wilayah_models.estimasi')->get();
        return view('pengiriman.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanggal = Carbon::now()->format('Ymd');
        $random = Str::random(15);
        $resi = $tanggal.$random;
        $kabupaten = WilayahModel::all();
        $kurir = User::where('posisi','=','kurir')->get();
        return view('pengiriman.create',['resi'=> $resi, 'kabupaten'=> $kabupaten,'kurir'=>$kurir]);
    }

    // cek harga

    public function cek_harga(Request $request)
    {
        $kabupaten = $request->input('kabupaten');
        $berat = $request->input('berat');
        $harga = HargaModel::where('id_wilayah','=',$kabupaten)->select('harga')->get();
        $estimasi = WilayahModel::where('id_wilayah','=',$kabupaten)->select('estimasi')->get();
        foreach($harga as $i){
            $harga_wilayah = $i->harga;
        }
        foreach($estimasi as $j){
            $estimasi = $j->estimasi." Hari";
        }
        $harga_akhir = $berat*$harga_wilayah;
        return response()->json(['estimasi' => $estimasi, 'harga'=> $harga_akhir]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // simpan barang
        $barang = $request->validate([
            'nama_barang' => 'required',
            'berat_barang' => 'required'
        ]);

        $simpan_barang = BarangModel::create($barang);

        $id_barang_baru = $simpan_barang->id;
        $request['id_barang'] = $id_barang_baru;
        // simpan pengiriman
        $pengiriman = $request->validate([
            'id_kurir' => 'required',
            'resi' => 'required',
            'id_wilayah' => 'required',
            'id_admin' => 'required',
            'id_barang' => 'required',
            'nama_penerima' => 'required',
            'tlpn_penerima' => 'required',
            'alamat_penerima' => 'required',
            'nama_pengirim' => 'required',
            'tlpn_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'total_bayar' => 'required'
        ]);
        $simpan = PengirimanModel::create($pengiriman);

        return response()->json(['success'=>'berhasil']);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengiriman = PengirimanModel::findOrFail($id)->get();
        foreach($pengiriman as $i)
        {
            $id_barang = $i->id_barang;
            $id_wilayah = $i->id_wilayah;
            $id_kurir = $i->id_kurir;
            $id_admin = $i->id_admin;
        }
        $pengiriman_detail = PengirimanModel::findOrFail($id);
        $barang = BarangModel::findOrFail($id_barang);
        
        $kurir = User::findOrFail($id_kurir);
        $admin = User::findOrFail($id_admin);
        $kabupaten = WilayahModel::all();
        $kurirall = User::where('posisi','=','kurir')->get();
        $wilayah = WilayahModel::where('id_wilayah','=',$id_wilayah)->get();
        foreach($wilayah as $i){
            $wilayah_pengiriman = $i->id_wilayah;
            $estimasi = $i->estimasi;
        }

        return view('pengiriman.edit',['pengiriman' => $pengiriman, 'barang'=> $barang,'kurir'=> $kurir,'admin'=>$admin,'wilayah'=>$wilayah_pengiriman,'kabupaten'=>$kabupaten,'kurirall'=>$kurirall,'estimasi'=>$estimasi,'pengiriman_detail'=> $pengiriman_detail ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = BarangModel::findOrFail($request->input('id_barang'));
        // simpan barang
        $barang_data = $request->validate([
            'nama_barang' => 'required',
            'berat_barang' => 'required'
        ]);

        $edit_barang = $barang->update($barang_data);

        $id_barang_edit = $request->input('id_barang');
        $request['id_barang'] = $id_barang_edit;
        // simpan pengiriman
        $pengiriman = PengirimanModel::findOrFail($id);
        $pengiriman_ubah = $request->validate([
            'id_kurir' => 'required',
            'resi' => 'required',
            'id_wilayah' => 'required',
            'id_admin' => 'required',
            'id_barang' => 'required',
            'nama_penerima' => 'required',
            'tlpn_penerima' => 'required',
            'alamat_penerima' => 'required',
            'nama_pengirim' => 'required',
            'tlpn_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'total_bayar' => 'required'
        ]);
        $simpan = $pengiriman->update($pengiriman_ubah);

        return response()->json(['success'=>'berhasil']);
    }

    public function cetak_nota($id)
    {
        $pengiriman = PengirimanModel::findOrFail($id)->get();
        foreach($pengiriman as $i)
        {
            $id_barang = $i->id_barang;
            $id_wilayah = $i->id_wilayah;
            $id_kurir = $i->id_kurir;
            $id_admin = $i->id_admin;
        }
        $pengiriman_detail = PengirimanModel::findOrFail($id);
        $barang = BarangModel::findOrFail($id_barang);
        
        $kurir = User::findOrFail($id_kurir);
        $admin = User::findOrFail($id_admin);
        $kabupaten = WilayahModel::all();
        $kurirall = User::where('posisi','=','kurir')->get();
        $wilayah = WilayahModel::where('id_wilayah','=',$id_wilayah)->get();
        foreach($wilayah as $i){
            $wilayah_pengiriman = $i->id_wilayah;
            $estimasi = $i->estimasi;
        }

        return view('pengiriman.bukti_pengiriman',['pengiriman' => $pengiriman, 'barang'=> $barang,'kurir'=> $kurir,'admin'=>$admin,'wilayah'=>$wilayah_pengiriman,'kabupaten'=>$kabupaten,'kurirall'=>$kurirall,'estimasi'=>$estimasi,'pengiriman_detail'=> $pengiriman_detail ]);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
