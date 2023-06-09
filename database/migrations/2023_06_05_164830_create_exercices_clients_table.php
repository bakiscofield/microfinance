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
        Schema::create('exercices_clients', function (Blueprint $table) {
            $table->id();
            $table->integer("exercice_id");
            $table->integer("client_id");
            $table->integer("montant_journalier")->default(200);
            $table->integer("jour_recolte")->default(0);
            //$table->string("solde_mois"); Attribut calculé
            $table->timestamps();
            $table->foreign("exercice_id")->references("id")->on("exercices")->cascadeOnDelete();
            $table->foreign("client_id")->references("id")->on("clients")->cascadeOnDelete();
            //$table->primary(["exercice_id", "client_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercices_clients');
    }
};
