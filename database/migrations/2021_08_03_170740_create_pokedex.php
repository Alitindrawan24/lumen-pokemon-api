<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokedex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokedex', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('pokedex_number')->index();
            $table->string('name');
            $table->bigInteger('type_1')->unsigned();
            $table->bigInteger('type_2')->unsigned()->nullable();
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('special_attack');
            $table->integer('special_defense');
            $table->integer('speed');
            $table->timestamps();

            $table->foreign('type_1')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('type_2')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokedex', function (Blueprint $table) {
            $table->dropForeign('pokedex_type_1_foreign');
            $table->dropForeign('pokedex_type_2_foreign');
        });
        Schema::dropIfExists('pokedex');
    }
}
