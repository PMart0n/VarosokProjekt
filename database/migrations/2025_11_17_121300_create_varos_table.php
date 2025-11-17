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
        Schema::create('varos', function (Blueprint $table) {
            $table->id(); // Város azonosítója
            $table->string('nev'); // Város neve
            // Külső kulcs
            $table->foreignId('megyeid')->constrained('megye'); 
            $table->boolean('megyeszekhely'); // Igaz/Hamis
            $table->boolean('megyeijogu');    // Igaz/Hamis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varos');
    }
};
