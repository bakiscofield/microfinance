<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciceClient extends Model
{
    use HasFactory;
    protected $fillable = [
        "montant_journalier","periode_recolte","solde_mois","id_client","id_client",
    ];
}
