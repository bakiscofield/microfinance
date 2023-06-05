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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string("numero");
            $table->string("coordonnees");
            $table->bigInteger("id_employe");
            $table->bigInteger("id_zone");
            $table->timestamps();
            $table->foreign("id_employe")->references("id")->on("employes");
            $table->foreign("id_zone")->references("id")->on("zones");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
