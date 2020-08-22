<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctor')->onDelete('cascade');
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('nurse_id')->references('id')->on('nurse')->onDelete('cascade');
            $table->string('nik');
            $table->foreign('nik')->references('nik')->on('patient_family')->onDelete('cascade');
            $table->string('name');
            $table->integer('age');
            $table->text('address');
            $table->string('number_phone')->nullable();
            $table->date('date_inpatient');
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
        Schema::dropIfExists('patient');
    }
}
