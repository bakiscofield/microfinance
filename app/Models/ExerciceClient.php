<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExerciceClient extends Model
{
    use HasFactory;
    protected $fillable = [
        "montant_journalier","jour_recolte", "exercice_id", "client_id"
    ];
    protected $table = "exercices_clients";

    public function isCurrent(): Bool {
        return $this->exercice->isCurrent();
    }

    public function client() :BelongsTo{
        return $this->belongsTo(Client::class);
    }

    public function exercice() :BelongsTo{
        return $this->belongsTo(Exercice::class);
    }

    public function recoltes():HasMany{
        return $this->hasMany(Recolte::class);
    }
}
