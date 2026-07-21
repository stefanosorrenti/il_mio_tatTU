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
        Schema::table('tattoos', function (Blueprint $table) {

            //Collonna aggiunntiva per la tabella tattoos
            $table->integer('time')->nullable()->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tattoos', function (Blueprint $table) {
            
            //Rimuovo la modfica
            $table->dropColumn('time');
        });
    }
};
