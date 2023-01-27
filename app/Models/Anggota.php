<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;


    protected $guarded = [];
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pengembalians()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
