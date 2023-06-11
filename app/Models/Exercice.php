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

    public static function currentExercice(){
        foreach(Exercice::all() as $exercice){
            if ($exercice->isCurrent()){
                return $exercice;
            }
        }
        return null;
    }
    
    public function isCurrent(): Bool{
        return $this->date_fin->gte(Carbon::now());
    }

    public function exercice_clients():HasMany{
        return $this->hasMany(ExerciceClient::class);
    }

    
   
}
