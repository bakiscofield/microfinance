<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercice extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_debut","date_fin",
    ];

    public function clients():BelongsToMany{
        return $this->belongsToMany(Client::class, "exercices_clients", "exercice_id", "client_id")->using(ExerciceClient::class);
    }

    public function recoltes():HasMany{
        return $this->hasMany(Recolte::class);
    }

   
}
