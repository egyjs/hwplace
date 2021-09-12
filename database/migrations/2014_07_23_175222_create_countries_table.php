<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // trans
            $table->longText('description')->nullable(); // trans
            $table->string('currency')->nullable(); // USD
            $table->string('currency_code')->nullable(); // $
            $table->string('iso',2)->nullable(); // US
            $table->integer('un_code')->nullable(); // 1,20,966

            $table->string("flag")->nullable();
            $table->string("tax_percentage")->default(0);

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
        Schema::dropIfExists('countries');
    }
}
