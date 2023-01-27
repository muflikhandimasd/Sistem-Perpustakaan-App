<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $guarded = [];

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_details', 'peminjaman_id', 'buku_id')->withTimestamps();;
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
