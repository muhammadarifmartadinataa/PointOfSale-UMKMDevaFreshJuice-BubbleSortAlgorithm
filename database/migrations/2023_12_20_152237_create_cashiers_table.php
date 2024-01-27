<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('namajus',['Apel Mix Tomat','Apel Mix Strawberry','Wortel Mix Tomat','Sirsak Mix Tomat','Timun Mix Jeruk','Mangga','Apel','Alpukat','Jambu','Buah Naga','Strawberry','Sirsak','Lemon','Anggur','Jeruk','Semangka']);
            $table->bigInteger('harga');
            $table->bigInteger('qty');
            $table->bigInteger('totalharga');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashiers');
    }
};
