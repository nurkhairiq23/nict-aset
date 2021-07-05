<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('id_inventory');
            $table->string('nama_inventory');
            $table->string('no_kwitansi')->unique();
            $table->string('vendor');
            $table->integer('harga');
            $table->foreignId('id_jenis_barang');
            $table->date('tgl_perolehan');
            $table->date('tgl_pembukuan');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->string('foto_inventory');
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
        Schema::dropIfExists('inventory');
    }
}
