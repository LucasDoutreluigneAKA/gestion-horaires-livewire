<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 255)->default('Sans nom.');
            $table->string('description', 500)->default('Sans description.');
            $table->date('first_date');
            $table->string('first_date_day_name');
            $table->integer('first_date_week_parity');
            $table->string('begin_hour');
            $table->string('end_hour');
            $table->boolean('do_every_day')->default(false);
            $table->boolean('do_every_week')->default(false);
            $table->boolean('do_every_two_weeks')->default(false);
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
