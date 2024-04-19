<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use App\Models\TrackingModel;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index($id)
    {
        $data = TrackingModel::where('id_pengiriman','=',$id)->get();
        return view('track.index',['data'=> $data,'id'=>$id]);
    }
    public function create($id)
    {
        return view('track.create',['id'=>$id]);
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'id_pengiriman' => 'required',
                'status' => 'required',
                'tanggal' => 'required'
            ]);
        $simpan = TrackingModel::create($data);
        return response()->json(['success'=> 'berhasil']); 
    }
    public function cek_resi()
    {
        return view('track.cek_resi');
    }
    public function cek(Request $request)
    {
        $resi = $request->input('resi');

        $pengiriman = PengirimanModel::where('resi','=',$resi)->get();
        foreach($pengiriman as $i){
            $id = $i->id;
        }
        $track = TrackingModel::where('id_pengiriman','=',$id)->get();
        return view('track.data_status',['data'=>$track]);    }
}
