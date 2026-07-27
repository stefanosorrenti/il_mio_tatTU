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
            
            //Modifico 'image_path' ed imposto  un valore di default
            $table->string('image_path')->nullable()->default('https://freesvg.org/img/Placeholder.png')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tattoos', function (Blueprint $table) {
            //Ripristino 'image_path' 
            $table->string('image_path')->nullable(false)->default(null)->change();
        });
    }
};
