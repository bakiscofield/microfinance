<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id","id_zone",
    ];

    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function zone() :BelongsTo{
        return $this->belongsTo(Zone::class);
    }

    public function exercices():BelongsToMany{
        return $this->belongsToMany(Exercice::class, "exercices_clients", "client_id", "exercice_id")->using(ExerciceClient::class);
    }
}
