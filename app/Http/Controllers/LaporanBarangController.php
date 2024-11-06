<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\LaporanBarang;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LaporanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data['belumDiterima'] = LaporanBarang::with(['barang', 'user'])->where('status', 'belum diterima')->orderBy('created_at', 'desc')->get();
        $data['sudahDiterima'] = LaporanBarang::with(['barang', 'user'])->where('status', 'diterima')->orderBy('created_at', 'desc')->get();
        $data['activeTab'] = 'belum-diterima';
        return view('barang_laporan.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function terima(string $id)
    {
        $data['lapBarang'] = LaporanBarang::findOrFail($id);
        $data['barang'] = Barang::pluck('nama_barang', 'id');
        return view('barang_laporan.terima', $data);
    }

    public function keluarkan(Request $request, string $id){
        $validated = $request->validate([
            'barang_id' => 'required|max:255',
            'jml_barang_keluar' => 'required',
            'keterangan' => 'required'
        ]);

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

        LaporanBarang::where('id', $id)->update(['status'=>'diterima']);    
        $notification = array(
            'message' => "Data Barang berhasil Dikeluarkan!",
            'alert-type' => 'success'
        );
    
        return redirect()->route('laporan_barang.index')->with($notification);
    }

    public function formLaporan()
    {
        $data['barangs'] = Barang::pluck('nama_barang', 'id');
        return view('melaporkan_barang.melaporkan', $data);
    }

    public function kirimLaporan(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required',
            'jml_barang_terlapor' => 'required',
            'keterangan' => 'required',
            'status' =>'required',
            'user_id' => 'required'
        ]);

        $barang_masuk = LaporanBarang::create($validated);

        $notification = array(
            'message' => "Barang Berhasil Dilaporkan!",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('dashboard')->with($notification);
        }
        else{
            return redirect()->route('dashboard')->with($notification);
        }
    }

    public function generatePDF()
    {
        $barang = LaporanBarang::get();
    
        $data = [
            'title' => 'Laporan Barang yang dilaporkan Inventory MI AL-HUDA',
            'date' => date('m/d/Y'),
            'barang' => $barang
        ]; 
        
        $pdf = FacadePdf::loadView('barang_laporan.barangpdf', $data);
       
        return $pdf->download('Cetak Barang terlapor.pdf');
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
