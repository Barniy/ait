<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeExaminationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_examination_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('examination_id');
            $table->foreign('examination_id')->references('id')->on('attribute_examinations');
            $table->string('key')->unique();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('attribute_examination_items');
    }
}
