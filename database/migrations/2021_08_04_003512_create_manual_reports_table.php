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
            $table->string('carer');
            $table->string('local');
            $table->string('non_local');
            $table->string('bor'); 
            $table->string('stage_1');
            $table->string('stage_2');
            $table->string('staff');
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
        Schema::dropIfExists('manual_reports');
    }
}
