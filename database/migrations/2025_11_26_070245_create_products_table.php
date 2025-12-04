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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->decimal('inr_price');
            $table->decimal('usd_price');
            $table->string('quantity');
            $table->string('image');
            $table->string('catalogue_number');
            $table->string('cas_number');
            $table->string('hsn_code');
            $table->string('molecular_formula');
            $table->string('molecular_weight');
            $table->string('purity');
            $table->string('density');
            $table->string('stock');
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
