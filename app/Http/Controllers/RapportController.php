<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\Zone;
use Illuminate\Http\Request;
use PDF;

class RapportController extends Controller
{
    /**
     * Génération du rapport du jour
     */
    public function generateTodayReport(Request $request) {
        $exercices = Exercice::all();
        $zones = Zone::all();
        $rapport = [];

        foreach ($exercices as $exercice) {
            foreach ($zones as $zone) {
                $rapport[$exercice->id][$zone->nom_zone] = 0;
                foreach ($exercice->exercice_clients as $exercice_client) {
                    if ($exercice_client->client->zone->nom_zone == $zone->nom_zone) {
                        foreach ($exercice_client->recoltes as $recolte) {
                            if ($recolte->date_recolte == today()) {
                                $rapport[$exercice->id][$zone->nom_zone] += $recolte;
                            }
                        }
                    }
                }
            }
        }

        $data = [
            'exercices' => $exercices,
            'rapport' => $rapport,
        ];

        $pdf = PDF::loadView('rapport', $data);

        // Lancement du téléchargement du fichier PDF
        return $pdf->download('rapport.pdf');
    }
}
