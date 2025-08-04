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
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('loan_request_id');
            $table->string('file_name', 255);
            $table->string('file_path', 255);
            $table->enum('file_type', ['surat_permohonan', 'surat_rekomendasi', 'foto_ktm', 'other']);
            $table->unsignedBigInteger('uploaded_by');
            $table->timestamps();
            $table->foreign('loan_request_id')->references('id')->on('loan_requests')->onDelete('cascade');
            $table->foreign('uploaded_by')->references('id')->on('users');
            $table->index('loan_request_id');
            $table->index('file_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
