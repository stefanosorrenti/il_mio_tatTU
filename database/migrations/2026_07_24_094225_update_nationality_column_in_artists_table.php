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
        Schema::table('artists', function (Blueprint $table) {
            
            // Rimuovo la colonna nationality dalla tabella artists
            $table->dropColumn('nationality');

            // Aggiungo la colonna nationality_id relazione 1-N con Nationality
            $table->foreignId('nationality_id')->nullable()->constrained()->onDelete('set null')->after('age');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            // Rimuovo la colonna nationality_id e la relazione con Nationality
            $table->dropForeign(['nationality_id']);
            $table->dropColumn('nationality_id');

            // Aggiungo nuovamente la colonna nationality
            $table->string('nationality')->nullable();
        });
    }
};
