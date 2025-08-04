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
        Schema::create('return_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('return_id');
            $table->unsignedBigInteger('loan_equipment_id');
            $table->integer('quantity_returned');
            $table->enum('condition_returned', ['baik', 'rusak_ringan', 'rusak_berat', 'hilang']);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('return_id')->references('id')->on('returns')->onDelete('cascade');
            $table->foreign('loan_equipment_id')->references('id')->on('loan_equipments');
            $table->index('return_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_items');
    }
};
