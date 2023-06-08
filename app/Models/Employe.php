<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "status","numero","coordonnees","id_zone",
    ];

    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function zone():BelongsTo{
        return $this->belongsTo(Zone::class);
    }

    public function recoltes():HasMany{
        return $this->hasMany(Recolte::class);
    }

}
