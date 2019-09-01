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
            $table->string('icon');
            $table->string('FQND');
            $table->string('OS');
            $table->string('OS version');
            $table->string('CPU');
            $table->string('CPU brand');
            $table->string('RAM');
            $table->string('RAM brand');
            $table->macAddress('MAC address');
            $table->string('location');
            $table->string('HDD');
            $table->string('HDD brand');
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
