<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'jml_barang_terlapor',
        'keterangan',
        'status',
        'user_id',
    ];

    public function barang(): BelongsTo{
        return $this->belongsTo(Barang::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
