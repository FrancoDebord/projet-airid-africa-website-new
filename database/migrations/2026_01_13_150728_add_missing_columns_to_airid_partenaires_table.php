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
        Schema::table('airid_partenaires', function (Blueprint $table) {
            // Renommer logo en logo_partenaire si la colonne logo existe
            if (Schema::hasColumn('airid_partenaires', 'logo') && !Schema::hasColumn('airid_partenaires', 'logo_partenaire')) {
                $table->renameColumn('logo', 'logo_partenaire');
            }
            
            // Ajouter logo_partenaire si elle n'existe pas du tout
            if (!Schema::hasColumn('airid_partenaires', 'logo_partenaire')) {
                $table->string('logo_partenaire')->after('nom_partenaire');
            }
            
            // Ajouter type_partenaire si elle n'existe pas
            if (!Schema::hasColumn('airid_partenaires', 'type_partenaire')) {
                $table->string('type_partenaire')->default('industry_partner')->after('logo_partenaire');
            }
            
            // Ajouter nom_long_partenaire si elle n'existe pas
            if (!Schema::hasColumn('airid_partenaires', 'nom_long_partenaire')) {
                $table->string('nom_long_partenaire')->nullable()->after('nom_partenaire');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airid_partenaires', function (Blueprint $table) {
            // Supprimer les colonnes ajoutées
            if (Schema::hasColumn('airid_partenaires', 'type_partenaire')) {
                $table->dropColumn('type_partenaire');
            }
            if (Schema::hasColumn('airid_partenaires', 'nom_long_partenaire')) {
                $table->dropColumn('nom_long_partenaire');
            }
            // Note: On ne renomme pas logo_partenaire en logo pour éviter les problèmes
        });
    }
};
