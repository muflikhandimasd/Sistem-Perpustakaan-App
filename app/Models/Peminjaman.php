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
        return $this->belongsToMany(Buku::class, 'peminjaman_details')->withTimestamps();;
    }
}
