<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id');
            $table->foreignId('typeOfAppointment_id');
            $table->date('dateOfAppointment');
            $table->time('timeOfAppointment');
            $table->boolean('dental_cleaning')->default('0');
            $table->string('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //ForeingKeys
            $table->foreign('pet_id')->references('id')->on('pets');

            $table->foreign('typeOfAppointment_id')->references('id')->on('type_of_appointment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
