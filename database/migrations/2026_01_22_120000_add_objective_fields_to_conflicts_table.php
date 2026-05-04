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
        Schema::table('conflicts', function (Blueprint $table) {
            $table->string('objective_of_declaration')->nullable()->after('declaration_date_personal');
            $table->string('objective_other_text')->nullable()->after('objective_of_declaration');
            $table->date('objective_meeting_date')->nullable()->after('objective_other_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conflicts', function (Blueprint $table) {
            $table->dropColumn([
                'objective_of_declaration',
                'objective_other_text',
                'objective_meeting_date',
            ]);
        });
    }
};
