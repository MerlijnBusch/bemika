<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignActivityBelongsToPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_activity_belongs_to_patient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('planned_date');
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('patient_id');
            $table->timestamps();

            $table->foreign('activity_id')
                ->references('id')
                ->on('activity')
                ->onDelete('cascade');
            $table->foreign('patient_id')
                ->references('id')
                ->on('patient')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_activity_belongs_to_patient');
    }
}
