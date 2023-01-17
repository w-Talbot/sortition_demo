<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('randomisations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_id');
            $table->string('participant_id');
            $table->string('allocation');
            $table->string('randomised_by');
            $table->string('randomisation_date');
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
        Schema::dropIfExists('randomisations');
    }
};
