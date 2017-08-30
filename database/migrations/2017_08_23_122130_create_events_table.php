<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->integer('sous_menus_id')->unsigned()->index();
            $table->foreign('sous_menus_id')->references('id')->on('sous_menus')->onDelete('cascade')->onUpdate('cascade');
            $table->string('image');
            $table->dateTime('date_debut_envent');
            $table->dateTime('date_fin_event');
            $table->string('additional_note')->nullable();
            $table->string('localisation_nom')->nullable();
            $table->string('localisation_adresse')->nullable();
            $table->boolean('publie')->default(false);
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
        Schema::dropIfExists('events');
    }
}
