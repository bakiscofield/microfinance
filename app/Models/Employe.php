<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_utilisateur", "status",
    ];

    public function user() :HasOne{
        return $this->hasOne(User::class);
    }

    public function agent():BelongsTO{
        return $this->belongsTo(Agent::class);
    }
}
