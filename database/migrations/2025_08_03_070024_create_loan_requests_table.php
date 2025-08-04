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
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('request_number', 255)->unique();
            $table->unsignedBigInteger('user_id');
            $table->enum('loan_type', ['room', 'equipment', 'both']);
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('purpose');
            $table->text('notes')->nullable();
            $table->enum('status', ['draft', 'submitted', 'checked', 'approved', 'recommendation_issued', 'confirmed', 'active', 'returned', 'completed', 'rejected', 'cancelled']);
            $table->text('rejection_reason')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('recommendation_letter_path', 255)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->index('user_id');
            $table->index('status');
            $table->index('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_requests');
    }
};
