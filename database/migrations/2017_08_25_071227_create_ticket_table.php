<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->decimal('price', 10, 2);
            $table->integer('number');
            $table->dateTime('date_debut_vente');
            $table->dateTime('date_fin_vente');
            $table->integer('events_id')->unsigned()->index();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('ticket_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->dateTime('date_achat');
            $table->integer('ticket_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('payement_mode_id')->unsigned()->index();
            $table->foreign('ticket_id')->references('id')->on('ticket')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payement_mode_id')->references('id')->on('payement_mode')->onDelete('cascade');
        });

        Schema::create('payement_mode_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned()->index();
            $table->integer('payement_mode_id')->unsigned()->index();
            $table->foreign('ticket_id')->references('id')->on('ticket')->onDelete('cascade');
            $table->foreign('payement_mode_id')->references('id')->on('payement_mode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket');
        Schema::drop('ticket_user');
        Schema::drop('ticket_payement_mode');
    }
}
