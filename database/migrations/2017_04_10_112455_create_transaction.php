<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_plat');
            $table->float('total');
            $table->timestamps();
        });

        Schema::create('transaction_details', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('kode_item');
            $table->float('harga_beli');
            $table->float('harga_jual');
            $table->integer('jumlah');
            $table->float('total');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
        Schema::drop('transaction_details');
    }
}
