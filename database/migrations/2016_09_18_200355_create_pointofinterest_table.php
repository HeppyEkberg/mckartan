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
            $table->float('latitude', 8, 4);
            $table->float('longitude', 8, 4);
            $table->string('description', 500)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('pointOfInterestType_id');
            $table->boolean('rating')->nullable()->default(null);
            $table->integer('user_id');
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
