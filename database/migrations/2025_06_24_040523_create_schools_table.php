<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_type_id');
            $table->unsignedBigInteger('city_id');
            $table->string('name');
            $table->enum('level', ['SMA', 'SMK', 'ETC']);
            $table->string('npsn')->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->foreign('school_type_id')->references('id')->on('school_types')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
