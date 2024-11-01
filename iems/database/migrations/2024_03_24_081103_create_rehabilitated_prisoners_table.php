<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRehabilitatedPrisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rehabilitated_prisoners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prisoner_id');
            $table->boolean('rehabilitated')->default(false);
            $table->timestamps();

            
            $table->foreign('prisoner_id')->references('id')->on('prisoners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rehabilitated_prisoners');
    }
}
