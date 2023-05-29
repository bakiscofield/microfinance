<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_utilisateur","id_zone",
    ];

    public function user() :HasOne{
        return $this->hasOne(User::class);
    }

    public function zone() :BelongsTo{
        return $this->belongsTo(Zone::class);
    }

    public function exercices() :HasMany{
        return $this->hasMany(Exercice::class);
    }
}
