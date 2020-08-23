<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientBackupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_backup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctor');
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('nurse_id')->references('id')->on('nurse');
            $table->string('nik');
            $table->foreign('nik')->references('nik')->on('patient_family');
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
        Schema::dropIfExists('patient_backup');
    }
}
