<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('philanthropy_items', function (Blueprint $table) {
            $table->string('apply_form_type', 50)->nullable()->after('document_path')->comment('e.g. hardship_fund = formulaire candidature');
            $table->text('apply_intro')->nullable()->after('apply_form_type')->comment('Texte court affiché sur la page Apply');
        });
    }

    public function down(): void
    {
        Schema::table('philanthropy_items', function (Blueprint $table) {
            $table->dropColumn(['apply_form_type', 'apply_intro']);
        });
    }
};
