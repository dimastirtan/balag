<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    protected $fillable = [
        'nama_mobil',
        'plat_nomor',
        'warna',
        'gambar',
        'status',
        'created_at',
        'update_at',
    ];
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'mobil_id');
    }
}
