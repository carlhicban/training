<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('ext_name');
            $table->string('gender');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->unsignedBigInteger('guardian_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('year_level_id')->nullable();
            $table->unsignedBigInteger('grade_level_id')->nullable();
            $table->string('contact_information');
            $table->string('address');
            $table->string('email');
            $table->string('status');
            $table->timestamps();

            $table->foreign('guardian_id')
            ->references('id')
            ->on('guardian_information')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('department_id')
            ->references('id')
            ->on('departments')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('year_level_id')
            ->references('id')
            ->on('year_levels')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('grade_level_id')
            ->references('id')
            ->on('grade_levels')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_information');
    }
}
