<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'pendaftaran_id',
        'nama_bank',
        'name',
        'nominal',
        'image'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}