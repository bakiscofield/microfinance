<?php

namespace App\Exports;

use App\Models\Recolte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecoltesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Recolte::select("id", "date_recolte", "montant", "exercice_client_id", "created_at")->get();
    }

    public function headings(): array
    {
        return ["ID", "DATE RECOLTE", "MONTANT", "ID EXERCICE CLIENT", "DATE CRÉATION"];
    } 
}
