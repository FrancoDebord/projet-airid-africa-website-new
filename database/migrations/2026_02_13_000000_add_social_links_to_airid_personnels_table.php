<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Réseaux sociaux : afficher l'icône uniquement si l'URL est enregistrée.
     */
    public function up(): void
    {
        Schema::table('airid_personnels', function (Blueprint $table) {
            $table->string('link_facebook', 500)->nullable()->after('email_personnel');
            $table->string('link_twitter', 500)->nullable()->after('link_facebook');
            $table->string('link_linkedin', 500)->nullable()->after('link_twitter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airid_personnels', function (Blueprint $table) {
            $table->dropColumn(['link_facebook', 'link_twitter', 'link_linkedin']);
        });
    }
};
