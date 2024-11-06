<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    //
    public function index(){
        $data['barangMasuks'] = BarangMasuk::with('barang')->orderBy('created_at', 'desc')->get();
        return view('barang_masuk.index', $data);
    }

    public function create(){
        $data['barangs'] = Barang::pluck('nama_barang', 'id');
        return view('barang_masuk.create', $data);
    }

    public function edit(string $id){
        $data['barangMasuk'] = BarangMasuk::findOrFail($id);
        $data['barangs'] = Barang::pluck('nama_barang', 'id');
        return view('barang_masuk.edit', $data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'barang_id' => 'required',
            'jml_barang_masuk' => 'required',
            'total_harga_barang' => 'required',
            'user_id' => 'required'
        ]);

        $barang_masuk = BarangMasuk::create($validated);
        $barang_id = $barang_masuk->barang_id;
        $barang = Barang::findOrFail($barang_id);
        $stok_barang = $barang->stok;
        $tambahStok = $barang_masuk->jml_barang_masuk;
        $total_stok = $stok_barang + $tambahStok;
        Barang::where('id', $barang_id)->update(
            ['stok' => $total_stok]
        );

        $notification = array(
            'message' => "Data Barang berhasil ditambahkan!",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('barang_masuk.index')->with($notification);
        }
        else{
            return redirect()->route('barang_masuk.create')->with($notification);
        }
    }

    public function update(Request $request, string $id){
        $barang_masuk_old = BarangMasuk::findOrFail($id);
        $jml_old = $barang_masuk_old->jml_barang_masuk;
        
        $validated = $request->validate([
            'barang_id' => 'required',
            'jml_barang_masuk' => 'required',
            'total_harga_barang' => 'required'
        ]);
        
        BarangMasuk::where('id', $id)->update($validated);
        
        $barang_masuk = BarangMasuk::findOrFail($id);
        $jml_new = $barang_masuk->jml_barang_masuk;
        $barang_id = $barang_masuk->barang_id;
        
        $barang = Barang::findOrFail($barang_id);
        
        $selisih = $jml_new - $jml_old;
        
        $barang->stok += $selisih;
        $barang->save();
        $notification = array(
            'message' => "Data Barang berhasil diupdate!",
            'alert-type' => 'success'
        );
        if ($request->save == true) {
            return redirect()->route('barang_masuk.index')->with($notification);
        }
        else{
            return redirect()->route('barang_masuk.create');
        }
    }

    public function destroy(string $id){
        $barangMasuk = BarangMasuk::findOrFail($id);
        $jml_barang_masuk = $barangMasuk->jml_barang_masuk;
        $id_barang = $barangMasuk->barang_id;
        $barang = Barang::findOrFail($id_barang);
        $stok_barang = $barang->stok;
        $stoknew = $stok_barang - $jml_barang_masuk;
          // Jika stok baru kurang dari 0, tetapkan menjadi 0
        if ($stoknew < 0) {
            $stoknew = 0;
        }
        Barang::where('id', $id_barang)->update(['stok'=> $stoknew]);
        $barangMasuk->delete();
        $notification = array(
            'message' => "Data Barang berhasil dihapus!",
            'alert-type' => 'success'
        );
        return redirect()->route('barang_masuk.index')->with($notification);;
    }

    public function generatePDF()
    {
        $barang = BarangMasuk::get();
    
        $data = [
            'title' => 'Laporan Barang masuk Inventory MI AL-HUDA',
            'date' => date('m/d/Y'),
            'barang' => $barang
        ]; 
        
        $pdf = FacadePdf::loadView('barang_masuk.barangpdf', $data);
       
        return $pdf->download('Cetak Barang masuk.pdf');
    }
}