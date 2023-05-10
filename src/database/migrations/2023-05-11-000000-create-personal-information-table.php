<?php

namespace Hexiros\PersonTrait\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('suffix')->nullable();
            $table->string('salutation')->nullable();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('personable_id');
            $table->string('personable_type');
            $table->timestamps();

            $table->index(['personable_id', 'personable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_information');
    }
}