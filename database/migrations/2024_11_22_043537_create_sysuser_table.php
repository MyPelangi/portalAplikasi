<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysuser', function (Blueprint $table) {
            $table->id();
            $table->string('ID_SyUser', 50)->unique();
            $table->string('Name', 30)->nullable();
            $table->string('Password')->nullable();
            $table->string('Type', 20)->nullable();
            $table->string('Role', 20)->nullable();
            $table->string('Validation')->nullable();
            $table->datetime('Expiry')->nullable();
            $table->float('LimitIn')->nullable();
            $table->float('LimitOut')->nullable();
            $table->string('CT', 20)->nullable();
            $table->boolean('ExportOption')->nullable();
            $table->boolean('BackDatedF')->nullable();
            $table->string('BRANCH', 10)->nullable();
            $table->string('SEGMENT', 10)->nullable();
            $table->string('MID', 50)->nullable();
            $table->boolean('ImmediateF')->nullable();
            $table->boolean('LockedF')->nullable();
            $table->integer('BLLocked')->nullable();
            $table->string('Email')->nullable();
            $table->string('Mobile', 100)->nullable();
            $table->datetime('Password_Expiry')->nullable();
            $table->string('Owner', 10)->nullable();
            $table->string('MenuID', 10)->nullable();
            $table->boolean('AllowedF')->nullable();
            $table->boolean('ShariaF')->nullable();
            $table->string('Last_Opr', 50)->nullable();
            $table->timestamp('Last_update')->nullable();
            $table->string('Title', 100)->nullable();
            $table->string('RefID', 10)->nullable();
            $table->string('Location', 10)->nullable();
            $table->string('AROLE', 20)->nullable();
            $table->string('CCODE', 10)->nullable();
            $table->string('ID_No', 30)->nullable();
            $table->string('ID_Type', 10)->nullable();
            $table->integer('SignerImageID')->nullable();
            $table->string('SignerName')->nullable();
            $table->string('SignerTitle')->nullable();
            $table->string('ISID', 50)->nullable();
            $table->boolean('ISIDF')->nullable();
            $table->datetime('CDate')->nullable();
            $table->string('CUserID', 50)->nullable();
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
        Schema::dropIfExists('sysuser');
    }
}
