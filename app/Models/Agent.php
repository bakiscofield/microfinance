<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        "id","numero_service","coordonnees","id_employe","id_zone"
    ];

    protected $primarykey = "id";

    public function employe():HasOne{
        return $this->hasOne(Employe::class);
    }

    public function zone():BelongsTo{
        return $this->belongsTo(Zone::class);
    }

    public function recoltes():HasMany{
        return $this->hasMany(Recolte::class);
    }
}
