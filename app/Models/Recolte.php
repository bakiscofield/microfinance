<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recolte extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_recolte","montant","id_exercice","id_agent",
    ];

    public function employe():BelongsTo{
        return $this->belongsTo(Employe::class);
    }

    public function exercice():BelongsTo{
        return $this->belongsTo(Exercice::class);
    }
}
