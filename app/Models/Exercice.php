<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;

class Exercice extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_debut","date_fin",
    ];

    protected $casts = [
        "date_debut" => "date:d/m/Y H:i:s",
        "date_fin" => "date:d/m/Y H:i:s",
    ];

    public function isCurrent(): Bool{
        return Carbon::createFromFormat("d/m/Y H:i:s", $this->date_fin)->gte(Carbon::now());
    }

    public function exercice_clients():HasMany{
        return $this->hasMany(ExerciceClient::class);
    }

    
   
}
