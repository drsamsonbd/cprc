<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id(); 
            $table->string('reg_number');
            $table->string('kp_passport');
            $table->string('pkrc');
            $table->string('marriage');
            $table->string('religion');
            $table->string('kin');
            $table->string('kin_address');
            $table->string('kin_relation');
            $table->string('kin_phone');
            $table->string('date');
            $table->string('time');
            $table->string('weight');
            $table->string('note');
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
        Schema::dropIfExists('admissions');
    }
}
