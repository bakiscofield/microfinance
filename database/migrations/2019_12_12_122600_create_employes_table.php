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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("status");
            $table->string("numero_service")->nullable();
            $table->bigInteger("id_zone")->nullable();
            $table->string("coordonnees")->nullable();
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("id_zone")->references("id")->on("zones");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
