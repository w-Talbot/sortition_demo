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
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string('study_name');
            $table->string('study_type');
            $table->string('study_description');
            $table->string('logo')->nullable();
            $table->string('study_monitor');
            $table->string('algorithm_type');
            $table->string('algorithm_masking');
            $table->string('algorithm_rng');
            $table->string('allocation_groups');
            $table->string('selection_options');
            $table->string('initial_sites');
            $table->string('field_warning');
            $table->string('inclusion_warning');
            $table->string('exclusion_warning');
            $table->string('item_groups');
            $table->string('allocation_message');
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
        Schema::dropIfExists('studies');
    }
};
