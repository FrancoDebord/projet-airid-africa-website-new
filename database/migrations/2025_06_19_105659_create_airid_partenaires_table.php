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
        Schema::create('airid_partenaires', function (Blueprint $table) {
            $table->id();
            $table->string("nom_partenaire");
            $table->text("description")->nullable();
            $table->string("logo");
            $table->text("site_web")->nullable();
            $table->text("linkedin")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airid_partenaires');
    }
};
