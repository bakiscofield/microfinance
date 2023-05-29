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
        "nom",

    ];

    public function clients():HasMany{
        return $this->hasMany(Client::class);
    }

    public function agents():HasMany{
        return $this->hasMany(Agent::class);
    }

    public function quartiers():HasMany{
        return $tihs->hasMany(Quartier::class);
    }
}
