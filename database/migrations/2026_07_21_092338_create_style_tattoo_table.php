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
        Schema::create('style_tattoo', function (Blueprint $table) {
            //Definico le colonne della tabella pivot style_tattoo
            $table->id();
            $table->foreignId('style_id')->constrained()->onDelete('cascade');
            $table->foreignId('tattoo_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('style_tattoo');
    }
};
