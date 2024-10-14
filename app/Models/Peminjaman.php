<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mobil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'user_id',
        'mobil_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'tujuan',
        'status',
        'created_at',
        'update_at',
    ];
    public function mobils()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
