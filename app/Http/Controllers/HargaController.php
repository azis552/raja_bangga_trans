<?php

namespace App\Http\Controllers;

use App\Models\HargaModel;
use App\Models\WilayahModel;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HargaModel::join('Wilayah_models','Harga_models.id_wilayah','=','wilayah_models.id_wilayah')
                            ->select('Harga_models.*','Wilayah_models.nama_wilayah as nama')->get();
        return view('harga.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wilayah = WilayahModel::all();
        return view('harga.create',['wilayah'=>$wilayah]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_wilayah' => 'required|unique:harga_models',
            'harga' => 'required',
        ]);

        try {
            HargaModel::create($data);
            return response()->json(['success' => 'Harga Berhasil ditambah.']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat menambah: ' . $e->getMessage()], 500);
        }
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
        $wilayah = WilayahModel::all();
        $data = HargaModel::findOrFail($id);
        return view('harga.edit',['wilayah'=>$wilayah,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = HargaModel::findOrFail($id);
        $edit = $request->validate([
            'id_wilayah' => 'required',
            'harga' => 'required'
        ]);
        try {
            $data->update($edit);
            return response()->json(['success' => 'Berhasil']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat menambah: ' . $e->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = HargaModel::findOrFail($id);

        try {
            $data->delete();
            return response()->json(['success' => 'Berhasil']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat menambah: ' . $e->getMessage()], 500);
        }

    }
}
