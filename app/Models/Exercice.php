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
        "date_debut","date_fin",
    ];

    public function clients():belongsToMany{
        return $this->belongsToMany(ExerciceClient, "exercice_id", "client_id");
    }

    public function recoltes():HasMany{
        return $this->hasMany(Recolte::class);
    }

   
}
