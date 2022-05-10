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
            $table->string('tipe');
            $table->string('name');
            $table->string('harga');
            $table->string('fasilitas');
            $table->string('jumlah');
            $table->integer('max');
            $table->enum('status', [0, 1])->comment('available', 'booked')->default(1);
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
