<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->integer('tahun_terbit');
            $table->integer('jumlah');
            $table->string('isbn');
            $table->foreignId('pengarang_id')->constrained('pengarangs')->onDelete('cascade');
            $table->foreignId('penerbit_id')->constrained('penerbits')->onDelete('cascade');
            $table->foreignId('rak_id')->constrained('raks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};
