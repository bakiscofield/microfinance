<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recolte extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_recolte","montant","id_exercice","id_agent",
    ];
}
