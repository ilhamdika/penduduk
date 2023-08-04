<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 18)->unique();
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->unsignedBigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinsis');
            $table->unsignedBigInteger('kabupaten_id');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens');
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
        Schema::dropIfExists('penduduks');
    }
};
