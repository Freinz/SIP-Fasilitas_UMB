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
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('name', 255);
            $table->string('code', 255)->unique();
            $table->text('description')->nullable();
            $table->integer('capacity')->default(0);
            $table->json('facilities')->nullable();
            $table->string('location', 255);
            $table->string('image_path', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index('is_active');
            $table->index('capacity');
            $table->foreign('category_id')->references('id')->on('room_categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
