<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembayaran;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_kelamin',
        'name',
        'asal_sekolah',
        'email',
        'no_hp',
        'no_hp_ayah',
        'no_hp_ibu',
        'nisn',
    ];

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}