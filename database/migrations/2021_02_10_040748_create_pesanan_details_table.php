<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_details', function (Blueprint $table) {
            $table->id('id_det');
            $table->integer('jumlah_pesanan');
            $table->integer('total_harga_det');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->string('warna');
            $table->text('deskripsi')->nullable();
            $table->string('contoh_model')->nullable();
            $table->string('model_ditawarkan')->nullable();
            $table->text('revisi')->nullable();
            $table->integer('product_id');
            $table->integer('pesanan_id');
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
        Schema::dropIfExists('pesanan_details');
    }
}
