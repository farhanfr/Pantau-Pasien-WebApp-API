<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_family', function (Blueprint $table) {
            $table->string('nik',16)->primary();
            $table->string('name',50);
            $table->text('address');
            $table->string('password');
            $table->string('number_phone')->nullable();
            $table->string('photo',100)->nullable();
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
        Schema::dropIfExists('patient_family');
    }
}
