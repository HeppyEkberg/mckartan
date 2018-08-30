<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeCoordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_id');
            $table->float('longitude', 8, 4);
            $table->float('latitude', 8, 4);
            $table->index('route_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routeCoordinates');
    }
}
