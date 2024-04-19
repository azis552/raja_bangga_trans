<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $database = PengirimanModel::select(
            DB::raw('MONTH(created_at) AS bulan'),
            DB::raw('YEAR(created_at) AS tahun'),
            DB::raw('count(id) AS total_jumlah')
        )
        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
        ->get();
        // dd($data);
        $data = [
            'labels' => [],
            'data' => []
        ];
        
        // Lakukan iterasi untuk setiap data yang telah diambil dari database
        foreach ($database as $item) {
            // Tambahkan nama bulan ke dalam array labels
            $data['labels'][] = \Carbon\Carbon::createFromDate(null, $item->bulan, null)->format('F');
            // Tambahkan total jumlah ke dalam array data
            $data['data'][] = $item->total_jumlah;
        }
        // Replace this with your actual data retrieval logic

        return view('dashboard.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
