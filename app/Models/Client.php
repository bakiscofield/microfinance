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

    public function exercice_clients():HasMany{
        return $this->hasMany(ExerciceClient::class);
    }

    public function getCurrentExerciceClient() {
        $exercices_clients = $this->exercice_clients;
        foreach ($exercices_clients as $exercice_client) {
            if ($exercice_client->isCurrent()){
                return $exercice_client ;
            }
        }
        return null;
    }
    
    public function getCurrentTontineRecoltes() {
        $exercices_clients = $this->exercice_clients();
        foreach ($exercices_clients as $exercice_client) {
            if ($exercice_client->isCurrent()){
                return $exercice_client->recoltes();
            }
        }
        return ;
    }

    public function getCurrentTontineInfo(): String {
        $data = [
            "jour_cotisation" => 0,
            "montant_journalier" => -1,
            "jour_restant" => -1
        ];

        return json_encode($data);
    }
}
