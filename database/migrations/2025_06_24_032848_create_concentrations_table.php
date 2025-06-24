<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcentrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concentrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_program_id');
            $table->string('code');
            $table->string('name');
            $table->string('short_name');
            $table->text('description');
            $table->decimal('min_grade', 4,2)->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->foreign('study_program_id')->references('id')->on('study_programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concentrations');
    }
}
