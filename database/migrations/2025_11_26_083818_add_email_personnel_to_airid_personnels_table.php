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
            if (!Schema::hasColumn('airid_personnels', 'email_personnel')) {
                $table->string('email_personnel')->unique()->nullable()->after('nom_personnel');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airid_personnels', function (Blueprint $table) {
            $table->dropColumn('email_personnel');
        });
    }
};
