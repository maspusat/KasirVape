<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'name', 'phone', 'address'];

    // Optional: Jika Anda memiliki aturan validasi tambahan
    public static $rules = [
        'nik' => 'required|unique:customers,nik',
        'name' => 'required',
        'phone' => 'nullable|numeric',
        'address' => 'nullable',
    ];

}
