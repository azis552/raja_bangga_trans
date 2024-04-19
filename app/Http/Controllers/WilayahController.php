<?php

namespace App\Http\Controllers;

use App\Models\WilayahModel;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WilayahModel::all();
        return view('wilayah.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_wilayah' => 'required|unique:wilayah_models',
            'nama_wilayah' => 'required',
            'estimasi' => 'required|integer',
        ]);

        try {
            WilayahModel::create($data);
            return response()->json(['success' => 'Wilayah Berhasil ditambah.']);
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
        $data = WilayahModel::findOrFail($id);

        return view('wilayah.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = WilayahModel::findOrFail($id);

        $edit = $request->validate([
            'id_wilayah' => 'required',
            'nama_wilayah' => 'required',
            'estimasi' => 'required|integer',
        ]);
        try {
            $data->update($edit);
            return response()->json(['success' => 'Wilayah Berhasil diubah.']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat mengubah ' . $e->getMessage()], 500);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= WilayahModel::findOrFail($id);
        try {
            $data->delete();
            return response()->json(['success' => 'Wilayah Berhasil dihapus']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat dihapus ' . $e->getMessage()], 500);
        }
    }
}
