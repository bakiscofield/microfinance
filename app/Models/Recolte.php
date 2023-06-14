<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recolte extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_recolte","montant", "exercice_client_id", "agent"
    ];

    public function exercice_client():BelongsTo{
        return $this->belongsTo(ExerciceClient::class);
    }
}
