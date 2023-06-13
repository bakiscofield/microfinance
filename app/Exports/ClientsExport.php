<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection ,WithHeadings
{

    public function collection()
    {
        //$clients =
        return Client::select("clients.id", "users.nom", "users.prenom", "users.contact", "clients.created_at")
            ->join('users', 'clients.user_id', "=" ,'users.id')
            ->get();
        //return Client::select("user_id", "zone_id", "created_at")->get();
    }

    public function headings(): array
    {
        return ["ID" ,"NOM", "PRENOM", "CONTACT", "DATE DE CRÉATION"];
    }
}
