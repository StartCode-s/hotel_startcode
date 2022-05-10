<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipe_id');
            $table->string('nama');
            $table->string('harga');
            $table->string('jumlah_kamar');
            $table->string('jumlah_kamar_mandi');

            $table->text('fasilitas');
            $table->integer('max');
            $table->enum('status', [0, 1])->comment('available', 'booked')->default(1);
            $table->text('thumb');


            $table->foreign('tipe_id')->references('id')->on('tipe_kamar')->onDelete('cascade');
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
        Schema::dropIfExists('kamar');
    }
}
