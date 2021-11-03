<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) { // burger king
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');



            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->longText('image'); // todo: add to controller as main image
            $table->json('images');
            $table->longText('google_map_location')->nullable(); // url
            $table->longText('website')->nullable();

            $table->integer('rates')->default(null)->nullable();

            $table->boolean('view_rates')->default(true)->nullable();
            $table->boolean('is_top')->default(false); // top 10

            $table->longText('keywords')->nullable();

            $table->boolean('is_active')->default(true); // active
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
        Schema::dropIfExists('places');
    }
}
