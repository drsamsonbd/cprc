<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseSamplingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_samplings', function (Blueprint $table) {
            $table->id();
            $table->string('kp_passport');
            $table->string('symptomatic');
            $table->string('onset');
            $table->string('screening_type');
            $table->string('exposure_type');
            $table->string('reinfection');
            $table->string('date_sample');
            $table->string('date_mka');
            $table->string('type_sample');
            $table->string('grading');
            $table->string('date_result');
            $table->string('vaccine_type');
            $table->string('first_dose_date');
            $table->string('second_dose_date');
            $table->string('notes');

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
        Schema::dropIfExists('case_samplings');
    }
}
