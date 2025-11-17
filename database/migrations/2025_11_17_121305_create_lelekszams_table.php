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
        Schema::create('lelekszam', function (Blueprint $table) {
            $table->id(); 
            // Külső kulcs
            $table->foreignId('varosid')->constrained('varos'); 
            $table->integer('ev');
            $table->integer('no');       // Nők száma
            $table->integer('osszesen'); // Összesen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelekszams');
    }
};
