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
        Schema::table('airid_vacancies', function (Blueprint $table) {
            if (!Schema::hasColumn('airid_vacancies', 'intitule_recrutement')) {
                $table->string('intitule_recrutement')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'type_contrat_propose')) {
                $table->string('type_contrat_propose')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'a_propos_airid')) {
                $table->text('a_propos_airid')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'resume_poste')) {
                $table->text('resume_poste')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'responsabilites_principales')) {
                $table->text('responsabilites_principales')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'qualifications')) {
                $table->text('qualifications')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'offre')) {
                $table->text('offre')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'comment_postuler')) {
                $table->text('comment_postuler')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'date_fin_candidature')) {
                $table->date('date_fin_candidature')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'plus_info')) {
                $table->text('plus_info')->nullable();
            }
            if (!Schema::hasColumn('airid_vacancies', 'note_info')) {
                $table->text('note_info')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airid_vacancies', function (Blueprint $table) {
            $columns = [
                'intitule_recrutement',
                'type_contrat_propose',
                'a_propos_airid',
                'resume_poste',
                'responsabilites_principales',
                'qualifications',
                'offre',
                'comment_postuler',
                'date_fin_candidature',
                'plus_info',
                'note_info',
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('airid_vacancies', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
