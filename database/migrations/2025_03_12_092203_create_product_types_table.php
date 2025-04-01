<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Voeg standaard waardes toe
        DB::table('product_types')->insert([
            ['name' => 'Sieraden', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Keramiek', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Textiel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kunst', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
    }
};
