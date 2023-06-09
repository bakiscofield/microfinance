<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_client",
        "nom_zone",
        "description",
        "agent_responsable",
    ];

    public function clients():HasMany{
        return $this->hasMany(Client::class);
    }

    public function employes():HasMany{
        return $this->hasMany(Employe::class);
    }

    public function quartiers():HasMany{
        return $this->hasMany(Quartier::class);
    }
}
