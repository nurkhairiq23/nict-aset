<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id('ruangan_id');
            $table->string('nama_ruangan');
            $table->string('kode_ruangan')->unique();
            $table->integer('lantai');
            $table->foreignId('id_kategori_ruangan');
            $table->integer('luas');
            $table->string('foto_ruangan');
            $table->boolean('dipakai');
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
        Schema::dropIfExists('ruangan');
    }
}
