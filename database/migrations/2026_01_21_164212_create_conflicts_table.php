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
        Schema::create('conflicts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('position_role')->nullable();
            $table->string('department_unit')->nullable();
            $table->string('engagement_type')->nullable();
            $table->string('engagement_other_text')->nullable();
            $table->string('email_address')->nullable();
            $table->date('declaration_date_personal')->nullable();
            $table->boolean('financial_interest')->nullable();
            $table->text('financial_details')->nullable();
            $table->boolean('professional_interest')->nullable();
            $table->text('professional_details')->nullable();
            $table->boolean('personal_interest')->nullable();
            $table->text('personal_details')->nullable();
            $table->boolean('research_interest')->nullable();
            $table->text('research_details')->nullable();
            $table->text('other_information')->nullable();
            $table->boolean('declaration_agree')->default(false);
            $table->string('declaration_name')->nullable();
            $table->string('declaration_signature')->nullable();
            $table->date('declaration_date_sign')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conflicts');
    }
};
