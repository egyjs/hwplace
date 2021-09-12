<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // trans
            $table->longText('description')->nullable(); // trans
            $table->string('iso',2)->nullable(); //

            $table->foreignId('state_id')->constrained();


            // geolocation
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();



            $table->boolean('active')->default(true);


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
        Schema::dropIfExists('cities');
    }
}
