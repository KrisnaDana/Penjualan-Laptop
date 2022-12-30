<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    use HasFactory;
    protected $fillable = ["nama", "alamat"];

    public function laptop()
    {
        return $this->hasMany(laptop::class);
    }
}
