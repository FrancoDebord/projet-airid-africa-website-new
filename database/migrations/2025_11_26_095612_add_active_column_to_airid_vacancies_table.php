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
            if (!Schema::hasColumn('airid_vacancies', 'active')) {
                $table->boolean('active')->default(1);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airid_vacancies', function (Blueprint $table) {
            if (Schema::hasColumn('airid_vacancies', 'active')) {
                $table->dropColumn('active');
            }
        });
    }
};
