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
        Schema::create('tattoos', function (Blueprint $table) {
            //Definico le colonne della tabella tattoos
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path'); 
            $table->decimal('price', 8, 2)->nullable();

            // Relazione 1-N con Artist
            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tattoos');
    }
};
