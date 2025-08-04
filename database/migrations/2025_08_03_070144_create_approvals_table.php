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
        Schema::create('approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('loan_request_id');
            $table->unsignedBigInteger('approver_id');
            $table->enum('approver_role', ['admin_rt', 'admin_umum', 'pimpinan']);
            $table->enum('action', ['approve', 'reject']);
            $table->text('notes')->nullable();
            $table->timestamp('action_at');
            $table->timestamps();
            $table->foreign('loan_request_id')->references('id')->on('loan_requests')->onDelete('cascade');
            $table->foreign('approver_id')->references('id')->on('users');
            $table->index('loan_request_id');
            $table->index('approver_role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
