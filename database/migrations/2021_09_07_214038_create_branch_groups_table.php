<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('places'); // will contain a list of places IDs
            $table->timestamps();

//            $places = DB::connection()->getQueryGrammar()->wrap('places');
//            $table->unsignedInteger('places')->storedAs($places);
//            $table->foreign('places')->references('id')->on('places');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_groups');
    }
}
