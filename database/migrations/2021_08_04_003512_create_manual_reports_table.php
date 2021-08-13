<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_reports', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time'); 
            $table->string('pkrc'); 
            $table->string('male');
            $table->string('female');
            $table->string('paeds_male');
            $table->string('paeds_female');
            $table->string('step_up')->nullable();
            $table->string('discharged')->nullable();
            $table->string('home_q')->nullable();
            $table->string('pending');
            $table->string('stage_1');
            $table->string('carer');
            $table->string('local');
            $table->string('non_local');
            $table->string('bor'); 
            $table->string('stage_1');
            $table->string('stage_2');
            $table->string('stage_3')->nullable();
            $table->string('stage_4')->nullable();
            $table->string('stage_5')->nullable();
            $table->string('stage_1_1');
            $table->string('stage_1_2');
            $table->string('stage_2_1')->nullable();
            $table->string('stage_2_2')->nullable();
            $table->string('stage_3_1')->nullable();
            $table->string('stage_3_2')->nullable();
            $table->string('stage_4_1')->nullable();
            $table->string('stage_4_2')->nullable();
            $table->string('stage_5_1')->nullable();
            $table->string('stage_5_2')->nullable();
            $table->string('staff');
            $table->string('pui_adult')->nullable();
            $table->string('pui_paeds')->nullable();
            $table->string('pui_new')->nullable();
            $table->string('pui_discharged')->nullable();
            $table->string('pui_death')->nullable();
            $table->string('notes')->nullable(); 

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
        Schema::dropIfExists('manual_reports');
    }
}
