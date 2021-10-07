<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_ads', function (Blueprint $table) {
            $table->id();

            $table->longText('image');
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->foreignId('place_id')->nullable()->constrained()->cascadeOnDelete();
            $table->longText('link')->nullable();

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
        Schema::dropIfExists('section_ads');
    }
}
