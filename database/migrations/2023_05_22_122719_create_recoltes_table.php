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
            $table->bigInteger("id_exercice");
            $table->bigInteger("id_agent");
            $table->timestamps();
            $table -> foreign("id_agent")-> references("id")->on("agents");
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
