<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertConditionPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_condition_patient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('nurse_id')->references('id')->on('nurse')->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
            $table->string('nik');
            $table->foreign('nik')->references('nik')->on('patient_family')->onDelete('cascade');
            $table->string('color',25);
            $table->string('title');
            $table->text('message');
            $table->date('datepost');
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
        Schema::dropIfExists('alert_condition_patient');
    }
}
