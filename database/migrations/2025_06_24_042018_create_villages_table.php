<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id(); // bigint auto-increment
            $table->unsignedBigInteger('district_id'); // foreign key ke districts
            $table->string('code', 10)->unique(); // varchar(10), unique
            $table->string('name'); // varchar
            $table->enum('type', ['Desa', 'Kelurahan']); // enum
            $table->timestamps(); // created_at & updated_at

            // Relasi ke districts
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
    }
}
