<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barangKeluars'] = BarangKeluar::with('barang')->orderBy('created_at', 'desc')->get();
        return view('barang_keluar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['barangs'] = Barang::pluck('nama_barang', 'id');
        return view('barang_keluar.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi dasar
    $validated = $request->validate([
        'barang_id' => 'required',
        'jml_barang_keluar' => 'required|integer|min:1',
        'keterangan' => 'required',
        'user_id' => 'required'
    ]);

    // Ambil stok barang
    $id_barang = $validated['barang_id'];
    $stok_keluar = $validated['jml_barang_keluar'];

    $barang = Barang::findOrFail($id_barang);
    $stokbarang = $barang->stok;

    // Validasi tambahan untuk memastikan stok cukup
    if ($stok_keluar > $stokbarang) {
        throw ValidationException::withMessages([
            'jml_barang_keluar' => 'Jumlah barang keluar tidak boleh melebihi stok yang tersedia.',
        ]);
    }

    if ($stokbarang == 0) {
        throw ValidationException::withMessages([
            'barang_id' => 'Stok barang ini tidak ada, tidak dapat membuat transaksi barang keluar.',
        ]);
    }

    // Jika validasi lulus, lanjutkan dengan pembuatan record
    $barang_keluar = BarangKeluar::create($validated);

    // Hitung stok baru dan update stok barang
    $stoknew = $stokbarang - $stok_keluar;
    Barang::where('id', $id_barang)->update(['stok' => $stoknew]);

    $notification = array(
        'message' => "Data Barang berhasil Dikeluarkan!",
        'alert-type' => 'success'
    );

    return redirect()->route('barang_keluar.index')->with($notification);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function generatePDF()
    {
        $barang = BarangKeluar::get();
    
        $data = [
            'title' => 'Laporan Barang Keluar Inventory MI AL-HUDA',
            'date' => date('m/d/Y'),
            'barang' => $barang
        ]; 
        $pdf = FacadePdf::loadView('barang_keluar.barangpdf', $data);
       
        return $pdf->download('Cetak Barang Keluar.pdf');
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
