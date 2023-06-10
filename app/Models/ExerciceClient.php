<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExerciceClient extends Pivot
{
    use HasFactory;
    protected $fillable = [
        "montant_journalier","periode_recolte", "recolte_id",
    ];
    protected $primary_key = ["exercice_id", "client_id"];
    protected $table = "exercices_clients";

    public function recolte() :BelongsTo{
        return $this->belongsTo(Recolte::class);
    }
}
