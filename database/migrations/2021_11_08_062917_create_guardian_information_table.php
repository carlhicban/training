<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardianInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_information', function (Blueprint $table) {
            $table->id();
            $table->string('relationship');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('ext_name');
            $table->string('gender');
            $table->string('contact_information');
            $table->string('address');
            $table->unsignedBigInteger('occupation_id');
            $table->timestamps();

            $table->foreign('occupation_id')
            ->references('id')
            ->on('occupations')
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
        Schema::dropIfExists('guardian_information');
    }
}
