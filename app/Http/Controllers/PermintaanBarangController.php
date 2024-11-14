<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\PermintaanBarang;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;
use Illuminate\Http\Request;

class PermintaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['belumDiterima'] = PermintaanBarang::with(['barang', 'user'])->where('status', 'belum diterima')->orderBy('created_at', 'desc')->get();
        $data['sudahDiterima'] = PermintaanBarang::with(['barang', 'user'])->where('status', 'diterima')->orderBy('created_at', 'desc')->get();
        $data['activeTab'] = 'belum-diterima';
        return view('barang_permintaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function terima(string $id)
    {
        $data['lapBarang'] = PermintaanBarang::findOrFail($id);
        $data['barang'] = Barang::pluck('nama_barang', 'id');
        return view('barang_permintaan.permintaan', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function masukan(Request $request, string $id)
    {
        $validated = $request->validate([
            'barang_id' => 'required|max:255',
            'jml_barang_masuk' => 'required',
            'total_harga_barang' => 'required',
            'user_id' => 'required'
        ]);

        $barang_masuk = BarangMasuk::create($validated);
        $stok_masuk = $validated['jml_barang_masuk'];

        $id_barang = $validated['barang_id'];
        $barang = Barang::findOrFail($id_barang);
        $stokbarang = $barang->stok;
        $stoknew = $stokbarang + $stok_masuk;
        Barang::where('id', $id_barang)->update(['stok' => $stoknew]);

        PermintaanBarang::where('id', $id)->update(['status'=>'diterima']);    
        $notification = array(
            'message' => "Data Barang berhasil Ditambahkan!",
            'alert-type' => 'success'
        );
    
        return redirect()->route('permintaan_barang.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function formPermintaan()
    {
        $data['barangs'] = Barang::pluck('nama_barang', 'id');
        return view('meminta_barang.meminta', $data);
    }

    public function kirimPermintaan(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required',
            'jml_barang_permintaan' => 'required',
            'keterangan' => 'required',
            'status' =>'required',
            'user_id' => 'required'
        ]);

        $barang_masuk = PermintaanBarang::create($validated);

        $notification = array(
            'message' => "Permintaan Barang Akan Diproses!",
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
        $barang = PermintaanBarang::get();
    
        $data = [
            'title' => 'Laporan Barang yang dimohon Inventory MI AL-HUDA',
            'date' => date('m/d/Y'),
            'barang' => $barang
        ]; 
        
        $pdf = FacadePdf::loadView('barang_permintaan.barangpdf', $data);
       
        return $pdf->download('Cetak Barang yang dimohon.pdf');
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
