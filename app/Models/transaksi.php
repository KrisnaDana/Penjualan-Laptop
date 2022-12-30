<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ["nama", "no_telepon", "status", "total"];

    public function transaksi_detail()
    {
        return $this->hasMany(transaksi_detail::class);
    }
}
