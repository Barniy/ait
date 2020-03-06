<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('addressable_id');
            $table->string('addressable_type');
            $table->string('region')->nullable();
            $table->string('woreda')->nullable();
            $table->string('kebele')->nullable();
            $table->string('house_number')->nullable();
            $table->string('tel_phone_number')->nullable();
            $table->string('mobile_phone_number')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
