<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEosvotingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eosvotings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producer_name');
            $table->string('organization_name');
            $table->string('location');
            $table->string('domain');
            $table->integer('http_port');
            $table->integer('p2p_port');
            $table->string('public_key');
            $table->string('website');
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
        Schema::dropIfExists('eosvotings');
    }
}
