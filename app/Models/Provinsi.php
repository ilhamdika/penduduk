<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_provinsi'
    ];

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
