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
        Schema::create('returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('loan_request_id');
            $table->timestamp('return_date');
            $table->text('condition_notes')->nullable();
            $table->boolean('all_items_returned')->default(false);
            $table->decimal('fine_amount', 10, 2)->default(0);
            $table->text('fine_reason')->nullable();
            $table->unsignedBigInteger('received_by');
            $table->enum('status', ['partial', 'complete'])->default('complete');
            $table->timestamps();
            $table->foreign('loan_request_id')->references('id')->on('loan_requests')->onDelete('cascade');
            $table->foreign('received_by')->references('id')->on('users');
            $table->index('loan_request_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
