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
        Schema::create('airid_vacancies', function (Blueprint $table) {
            $table->id();
             $table->string("intitule_recrutement");
             $table->string("type_contrat_propose");
             $table->text("a_propos_airid")->nullable();
             $table->text("resume_poste")->nullable();
             $table->text("responsabilites_principales")->nullable();
             $table->text("qualifications")->nullable();
             $table->text("offre")->nullable();
             $table->text("comment_postuler")->nullable();
             $table->date("date_fin_candidature")->nullable();
             $table->text("plus_info")->nullable();
             $table->text("note_info")->nullable();
             $table->boolean("active")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airid_vacancies');
    }
};
