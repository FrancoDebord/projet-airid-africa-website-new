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
        Schema::table('airid_personnels', function (Blueprint $table) {
            if (!Schema::hasColumn('airid_personnels', 'description_poste')) {
                $table->text('description_poste')->nullable()->after('poste_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airid_personnels', function (Blueprint $table) {
            if (Schema::hasColumn('airid_personnels', 'description_poste')) {
                $table->dropColumn('description_poste');
            }
        });
    }
};
