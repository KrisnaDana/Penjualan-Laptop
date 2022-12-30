<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    use HasFactory;
    protected $fillable = ["transaksi_id", "laptop_id", "jumlah", "subtotal"];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, "transaksi_id");
    }

    public function laptop()
    {
        return $this->belongsTo(laptop::class, "laptop_id");
    }
}
