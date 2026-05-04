<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('philanthropy_items', function (Blueprint $table) {
            $table->string('status', 20)->default('ongoing')->after('active'); // ongoing | past
            $table->json('image_paths')->nullable()->after('image_path'); // array of filenames
            $table->string('document_path')->nullable()->after('content'); // PDF
        });
    }

    public function down(): void
    {
        Schema::table('philanthropy_items', function (Blueprint $table) {
            $table->dropColumn(['status', 'image_paths', 'document_path']);
        });
    }
};
