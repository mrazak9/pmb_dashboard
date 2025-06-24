<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id(); // bigint auto-increment
            $table->unsignedBigInteger('province_id'); // relasi ke provinces
            $table->string('code', 10)->unique(); // kode kota/kabupaten unik
            $table->string('name'); // nama kota/kabupaten
            $table->enum('type', ['kota', 'kabupaten']); // tipe kota
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
