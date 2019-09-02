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
            $table->ipAddress('ip');
            $table->string('collector');
            $table->string('assetValue');
            $table->string('icon');
            $table->string('FQND');
            $table->string('OS');
            $table->string('OSversion');
            $table->string('CPU');
            $table->string('CPUbrand');
            $table->string('RAM');
            $table->string('RAMbrand');
            $table->macAddress('MACaddress');
            $table->string('location');
            $table->string('HDD');
            $table->string('HDDbrand');
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
