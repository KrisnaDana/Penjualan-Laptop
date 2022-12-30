<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laptop extends Model
{
    use HasFactory;
    protected $fillable = ["nama", "keluaran", "spesifikasi", "stok", "harga", "perusahaan_id", "gambar"];

    public function perusahaan()
    {
        return $this->belongsTo(perusahaan::class, "perusahaan_id");
    }

    public function transaksi_detail()
    {
        return $this->hasMany(transaksi_detail::class);
    }
}
