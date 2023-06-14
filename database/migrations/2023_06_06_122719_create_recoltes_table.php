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
            $table->date("date_recolte")->default("now");
            $table->string("montant");
            $table->bigInteger('exercice_client_id');
            $table->bigInteger('agent')->nullable();
            $table->timestamps();
            $table->foreign("exercice_client_id")->references("id")->on("exercices_clients")->cascadeOnDelete();
            $table->foreign("agent")->references("id")->on("employes")->cascadeOnDelete()->nullOnDelete();

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
