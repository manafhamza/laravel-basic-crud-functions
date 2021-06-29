<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_experience', function (Blueprint $table) {
            $table->id();
            $table->integer('empId');
            $table->string('experienceTitle');
            $table->integer('years');
            $table->integer('months');
            $table->string('employer');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pervious_experience');
    }
}
