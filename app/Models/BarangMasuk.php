<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'jml_barang_masuk',
        'total_harga_barang',
        'user_id',
    ];

    public function barang(): BelongsTo{
        return $this->belongsTo(Barang::class);
    }
}
