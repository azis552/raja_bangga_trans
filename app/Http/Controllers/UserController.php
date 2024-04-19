<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('petugas.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'hak_akses' => 'required',
        ]);

        // Proses penambahan petugas
        try {
            $user = new User();
            $user->name = $request->nama_lengkap;
            $user->email = $request->email;
            $user->password = bcrypt($request->password); // Encrypt password
            $user->posisi = $request->hak_akses;
            $user->save();

            // Return JSON response for success
            return response()->json(['success' => 'Petugas berhasil ditambahkan.']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat menambahkan petugas: ' . $e->getMessage()], 500);
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
        $data = User::findOrFail($id);
        return view('petugas.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::findOrFail($id);

        $update = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'hak_akses' => 'required',
        ]);
        try {
            $data->update($update);
            return response()->json(['success' => 'Petugas berhasil diubah.']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat mengubah petugas: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        try {
            $data->delete();
            return response()->json(['success' => 'Petugas berhasil dihapus.']);
        } catch (\Exception $e) {
            // Return JSON response for error
            return response()->json(['error' => 'Terjadi kesalahan saat hapus petugas: ' . $e->getMessage()], 500);
        }
    }
}
