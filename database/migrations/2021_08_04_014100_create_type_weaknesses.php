<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeWeaknesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_weaknesses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->unsigned();
            $table->enum('effect_type', ['effective', 'ineffective','no_effect']);
            $table->bigInteger('effect_to')->unsigned();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('effect_to')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_weaknesses', function (Blueprint $table) {
            $table->dropForeign('type_weaknesses_type_id_foreign');
            $table->dropForeign('type_weaknesses_effect_to_foreign');
        });
        Schema::dropIfExists('type_weaknesses');
    }
}
