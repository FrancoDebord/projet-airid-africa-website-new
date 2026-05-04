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
            $table->unsignedInteger('ref_sequence')->unique()->after('id');
            $table->string('ref_no')->unique()->after('ref_sequence');
            $table->string('nature_of_conflict')->nullable()->after('engagement_other_text');
            $table->string('conflict_category')->nullable()->after('nature_of_conflict');
            $table->text('conflict_description')->nullable()->after('conflict_category');
            $table->date('date_declared')->nullable()->after('conflict_description');
            $table->text('management_action_agreed')->nullable()->after('date_declared');
            $table->string('responsible_officer')->nullable()->after('management_action_agreed');
            $table->date('review_date')->nullable()->after('responsible_officer');
            $table->string('status')->default('Open')->after('review_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conflicts', function (Blueprint $table) {
            $table->dropColumn([
                'ref_sequence',
                'ref_no',
                'nature_of_conflict',
                'conflict_category',
                'conflict_description',
                'date_declared',
                'management_action_agreed',
                'responsible_officer',
                'review_date',
                'status',
            ]);
        });
    }
};
