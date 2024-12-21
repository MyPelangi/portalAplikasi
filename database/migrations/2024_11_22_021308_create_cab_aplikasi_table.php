<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabAplikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cab_aplikasi', function (Blueprint $table) {
            $table->id();
            $table->string('kd', 10)->nullable();
            $table->string('nama_cabang', 100)->nullable();
            $table->string('jenis', 50)->nullable();
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
        Schema::dropIfExists('cab_aplikasi');
    }
}
