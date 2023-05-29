<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercice extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_debut","deate_fin","montant_journalier","periode_recolte","solde_mois","id_client","id_client",
    ];

    public function client():BelongsTO{
        return $this->belongsTo(Client::class);
    }

    public function recoltes():HasMany{
        return $this->hasMany(Recolte::class);
    }

   
}
