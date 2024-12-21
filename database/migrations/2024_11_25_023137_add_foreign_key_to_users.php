<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan foreign key
            $table->foreign('KodeUnit')->references('KodeUnit')->on('ms_unitkerja')->onDelete('cascade');
            $table->foreign('userCare')->references('ID_Syuser')->on('sysuser')->onDelete('cascade');
            $table->foreign('role')->references('ID_jabatan')->on('jabatan')->onDelete('cascade');
            $table->foreign('kd_cabang')->references('kd')->on('cab_aplikasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['KodeUnit']);
            $table->dropForeign(['userCare']);
            $table->dropForeign(['role']);
            $table->dropForeign(['kd_cabang']);
        });
    }
}
