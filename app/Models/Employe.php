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
        "user_id", "status",
    ];

    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function agent():BelongsTO{
        return $this->belongsTo(Agent::class);
    }
}
