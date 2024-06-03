<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'harga','deskripsi', 'stok'];
    public static $rules = [
        'nama_barang' => 'required',
        'harga' => 'required',
        'deskripsi' => 'required',
        'stok' => 'required'
    ];
}
