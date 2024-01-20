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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->string('material')->nullable();
            $table->longText('package')->nullable();
            $table->longText('size')->nullable();
            $table->longText('color')->nullable();
            $table->string('product_application')->nullable();
            $table->longText('applications')->nullable();
            $table->longText('features')->nullable();
            $table->string('delivery_time')->nullable();
            $table->longText('benefits')->nullable();
            $table->enum('color_type',['image','text'])->default('text');
            $table->string('color_text')->nullable();
            $table->string('dimension_image')->nullable();
            $table->string('application_image')->nullable();
            $table->string('usage_image')->nullable();
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
