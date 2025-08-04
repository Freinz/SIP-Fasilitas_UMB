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
        Schema::create('ktm_guarantees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('loan_request_id');
            $table->string('ktm_number', 255);
            $table->string('ktm_holder_name', 255);
            $table->string('ktm_image_path', 255)->nullable();
            $table->timestamp('deposited_at')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->unsignedBigInteger('deposited_by')->nullable();
            $table->unsignedBigInteger('returned_by')->nullable();
            $table->enum('status', ['deposited', 'returned'])->default('deposited');
            $table->timestamps();
            $table->foreign('loan_request_id')->references('id')->on('loan_requests')->onDelete('cascade');
            $table->foreign('deposited_by')->references('id')->on('users');
            $table->foreign('returned_by')->references('id')->on('users');
            $table->index('loan_request_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ktm_guarantees');
    }
};
