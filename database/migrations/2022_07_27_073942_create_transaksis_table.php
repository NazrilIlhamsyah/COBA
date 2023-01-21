<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_costumer');
            $table->foreign('id_costumer')->references('id')->on('costumers')->onDelete('CASCADE');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('CASCADE');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->date('tgl_transaksi');

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
        Schema::dropIfExists('transaksis');
    }
}
