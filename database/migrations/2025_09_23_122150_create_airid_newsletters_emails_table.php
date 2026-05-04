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
        if (!Schema::hasTable('airid_newsletters_emails')) {
            Schema::create('airid_newsletters_emails', function (Blueprint $table) {
                $table->id();
                $table->string("email_subscribe");
                $table->date("date_start_subscribe");
                $table->date("date_end_subscribe")->nullable();
                $table->boolean("active")->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airid_newsletters_emails');
    }
};
