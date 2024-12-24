<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pegawai',50)->nullable();
            $table->string('nm_pegawai',50)->nullable();
            $table->string('kd_divisi',50)->nullable();
            $table->string('kd_bidang',50)->nullable();
            $table->string('kd_seksi',50)->nullable();
            $table->string('KodeUnit',10)->nullable();
            $table->string('userCare',50)->nullable();
            $table->string('userCareSH',50)->nullable();
            $table->string('type',50)->nullable();
            $table->string('role')->nullable();
            $table->string('usernamePegawai',50)->nullable();
            $table->string('pass_pegawai',255)->nullable();
            $table->string('email_pegawai',50)->nullable();
            $table->string('unit_kerja',50)->nullable();
            $table->boolean('status_p')->nullable();
            $table->string('level_p',50)->nullable();
            $table->string('kd_cabang',10)->nullable();
            $table->string('id_useraplikasi',50)->nullable();
            $table->string('role_portal',50)->nullable();
            $table->boolean('status_reset')->nullable();
            $table->boolean('status_login')->nullable();
            $table->string('token_login',50)->nullable();
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
