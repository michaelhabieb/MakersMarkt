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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('product_type_id')->constrained('product_types')->onDelete('cascade');
            $table->string('material')->nullable();
            $table->string('production_time')->nullable();
            $table->string('complexity')->nullable();
            $table->string('durability')->nullable();
            $table->text('unique_features')->nullable();
            $table->foreignId('maker_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
