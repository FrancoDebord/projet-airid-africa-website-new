<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hardship_fund_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->date('date_of_birth');
            $table->string('nationality'); // Beninese national / permanent resident
            $table->string('university');
            $table->string('programme'); // STEM field
            $table->string('level'); // undergraduate | masters
            $table->string('proof_enrolment_path')->nullable();
            $table->string('transcript_path')->nullable();
            $table->string('support_letter_path')->nullable();
            $table->string('id_document_path')->nullable();
            $table->text('personal_statement')->nullable();
            $table->string('status')->default('pending'); // pending, under_review, approved, rejected
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hardship_fund_applications');
    }
};
