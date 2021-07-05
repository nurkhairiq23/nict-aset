<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id('id_inventaris');
            $table->string('kode_inventaris')->unique();
            $table->string('nama_inventaris');
            $table->foreignId('ruangan_id');
            $table->integer('nup');
            $table->year('tahun');
            $table->string('merk');
            $table->integer('harga');
            $table->string('keterangan');
            $table->enum('kondisi', ['Baik','Rusak Ringan', 'Rusak Berat']);
            $table->enum('label', ['Sudah Dilabel','Belum Dilabel']);
            $table->enum('sensus', ['Ditemukan','Tidak Ditemukan']);
            $table->string('foto_inventaris');
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
        Schema::dropIfExists('inventaris');
    }
}
