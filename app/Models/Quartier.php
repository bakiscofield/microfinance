<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quartier extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_zone","nom",
    ];

    public function zone():BelongsTo{
        return $this->belongsTo(Zone::class);
    }
}
