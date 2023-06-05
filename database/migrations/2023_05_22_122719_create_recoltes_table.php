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
        Schema::create('recoltes', function (Blueprint $table) {
            $table->id();
            $table->date("date_recolte");
            $table->string("montant");
            $table->timestamps();
            $table->bigInteger("id_employe");
            $table -> foreign("id_employe")-> references("id")->on("employes");

            $table->bigInteger("id_exercice");
            $table -> foreign("id_exercice")-> references("id")->on("exercices");


        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recoltes');
    }
};
