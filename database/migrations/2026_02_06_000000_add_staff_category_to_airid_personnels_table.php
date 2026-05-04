<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Categories for Our Team filter: management_operations, facility_platform_supervisors, research_team
     */
    public function up(): void
    {
        Schema::table('airid_personnels', function (Blueprint $table) {
            $table->string('staff_category', 50)->nullable()->after('poids_personnel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airid_personnels', function (Blueprint $table) {
            $table->dropColumn('staff_category');
        });
    }
};
