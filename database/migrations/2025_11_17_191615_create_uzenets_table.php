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
    Schema::create('uzenetek', function (Blueprint $table) {
        $table->id();
        $table->string('nev');       // Küldő neve
        $table->string('email');     // Küldő emailje
        $table->text('szoveg');      // Az üzenet szövege
        $table->timestamps();        // Létrehozás ideje (created_at)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uzenets');
    }
};
