<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'usernamePegawai');
            $table->renameColumn('password', 'pass_pegawai');
            $table->renameColumn('email', 'email_pegawai');
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
            $table->renameColumn('usernamePegawai', 'name');
            $table->renameColumn('pass_pegawai', 'password');
            $table->renameColumn('email_pegawai', 'email');
        });
    }
}
