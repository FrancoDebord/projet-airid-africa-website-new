<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Nettoie la table hardship_fund_applications :
     * - Supprime les colonnes dupliquées ou inutiles (full_name, address, permanent_resident, faculty, expected_graduation, gpa, personal_statement_path, declaration_date)
     * - Ajoute age si absent (optionnel, pour affichage admin)
     */
    public function up(): void
    {
        $tableName = 'hardship_fund_applications';

        $columnsToDrop = [
            'full_name',           // doublon : calculé via first_name + last_name (accessor)
            'address',             // doublon : utiliser residential_address
            'permanent_resident',  // doublon : utiliser is_permanent_resident
            'faculty',             // doublon : utiliser faculty_school
            'expected_graduation', // doublon : utiliser expected_graduation_date
            'gpa',                 // doublon : utiliser current_gpa
            'personal_statement_path', // doublon : utiliser personal_statement_file_path
            'declaration_date',    // inutile : date = jour de soumission (created_at)
        ];

        foreach ($columnsToDrop as $col) {
            if (Schema::hasColumn($tableName, $col)) {
                Schema::table($tableName, function (Blueprint $table) use ($col) {
                    $table->dropColumn($col);
                });
            }
        }

        if (!Schema::hasColumn($tableName, 'age')) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->unsignedTinyInteger('age')->nullable()->after('date_of_birth');
            });
        }
    }

    public function down(): void
    {
        $tableName = 'hardship_fund_applications';
        if (Schema::hasColumn($tableName, 'age')) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn('age');
            });
        }
    }
};
