<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExerciceClient extends Pivot
{
    use HasFactory;
    protected $fillable = [
        "montant_journalier","periode_recolte",
    ];
    protected $primary_key = ["id_exercice", "id_client"];
}
