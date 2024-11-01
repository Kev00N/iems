<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('national_id')->unique();
            $table->integer('sentence_period');
            $table->date('admission_date');
            $table->date('date_to_be_released');
            $table->unsignedBigInteger('crime_id'); 
            $table->timestamps();

            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prisoners');
    }
}
