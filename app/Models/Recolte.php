<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recolte extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_recolte","montant",
    ];

    public function exercice_clients():HasMany{
        return $this->hasMany(ExerciceClient::class);
    }
}
