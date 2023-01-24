<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function peminjamans()
    {
        return $this->belongsToMany(Peminjaman::class, 'peminjaman_details')->withTimestamps();;
    }
}
