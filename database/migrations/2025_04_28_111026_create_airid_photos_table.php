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
        Schema::create('airid_photos', function (Blueprint $table) {
            $table->id();
            $table->string("titre_photo");
            $table->text("description")->nullable();
            $table->enum("statut_photo",["principal","secondaire"]);
            $table->string("nom_photo");
            $table->enum("categorie_photo",["Project","News","Visits","Team Building","Capacity Building"]);
            $table->string("tag");
            $table->date("date_event");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airid_photos');
    }
};
