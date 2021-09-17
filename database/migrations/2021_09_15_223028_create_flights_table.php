<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Flights', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->unsignedBigInteger('Flight_type_id');
            $table->foreign('Flight_type_id')->references('id')->on('Flight_types');
            $table->char('size', 1);
            $table->boolean('is_active');
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
        Schema::dropIfExists('Flights');
    }
}
