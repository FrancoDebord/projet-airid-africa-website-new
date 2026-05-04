<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('philanthropy_items', function (Blueprint $table) {
            if (!Schema::hasColumn('philanthropy_items', 'closing_date')) {
                $table->date('closing_date')->nullable()->after('status')->comment('Date de clôture; après cette date status=past et active=0 peuvent être appliqués');
            }
            if (!Schema::hasColumn('philanthropy_items', 'document_path_fr')) {
                $table->string('document_path_fr')->nullable()->after('document_path')->comment('Document PDF en français');
            }
        });
    }

    public function down(): void
    {
        Schema::table('philanthropy_items', function (Blueprint $table) {
            if (Schema::hasColumn('philanthropy_items', 'closing_date')) {
                $table->dropColumn('closing_date');
            }
            if (Schema::hasColumn('philanthropy_items', 'document_path_fr')) {
                $table->dropColumn('document_path_fr');
            }
        });
    }
};
