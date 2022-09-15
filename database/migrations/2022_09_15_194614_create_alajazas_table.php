<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alajazas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sheikh_id');
            $table->json('sheikhs');
            $table->unsignedBigInteger('sanad_type_id')->nullable();
            $table->unsignedBigInteger('rewaya_id')->nullable();
            $table->foreign('sheikh_id')->references('id')->on('sheikhs')->cascadeOnDelete();
            $table->foreign('sanad_type_id')->references('id')->on('sanad_types')->nullOnDelete();
            $table->foreign('rewaya_id')->references('id')->on('rewayas')->nullOnDelete();
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
        Schema::dropIfExists('alajazas');
    }
};
