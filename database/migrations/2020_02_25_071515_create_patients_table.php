<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('medical_record_number');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('gender', ['Female', 'Male']);
            $table->date('date_of_birth');
            $table->string('language');
            $table->string('religion');
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
        Schema::dropIfExists('patients');
    }
}
