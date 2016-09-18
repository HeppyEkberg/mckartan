<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointofinterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointOfInterest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->float('latitud', 8, 4);
            $table->float('longitud', 8, 4);
            $table->integer('createdBy_id');
            $table->integer('pointOfInterestType_id');
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
        Schema::dropIfExists('pointOfInterest');
    }
}
