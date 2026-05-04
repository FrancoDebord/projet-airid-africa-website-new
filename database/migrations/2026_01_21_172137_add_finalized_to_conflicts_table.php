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
            $table->boolean('is_finalized')->default(false)->after('status');
            $table->timestamp('finalized_at')->nullable()->after('is_finalized');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conflicts', function (Blueprint $table) {
            $table->dropColumn(['is_finalized', 'finalized_at']);
        });
    }
};
