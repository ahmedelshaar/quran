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
            $table->unsignedBigInteger('bond_type_id')->nullable();
            $table->unsignedBigInteger('bond_id')->nullable();
            $table->foreign('sheikh_id')->references('id')->on('sheikhs')->cascadeOnDelete();
            $table->foreign('bond_type_id')->references('id')->on('bond_types')->nullOnDelete();
            $table->foreign('bond_id')->references('id')->on('bonds')->nullOnDelete();
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
