<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('hostname');
            $table->ipAddress('ip')->nullable();
            $table->string('collector')->nullable();
            $table->string('assetValue')->nullable();
            $table->string('icon')->nullable();
            $table->string('FQND')->nullable();
            $table->string('OS')->nullable();
            $table->string('OSversion')->nullable();
            $table->string('CPU')->nullable();
            $table->string('CPUbrand')->nullable();
            $table->string('RAM')->nullable();
            $table->string('RAMbrand')->nullable();
            $table->macAddress('MACaddress')->nullable();
            $table->string('location')->nullable();
            $table->string('HDD')->nullable();
            $table->string('HDDbrand')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hosts');
    }
}
