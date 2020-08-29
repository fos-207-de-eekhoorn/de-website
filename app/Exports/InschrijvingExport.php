<?php

namespace App\Exports;

use App\Inschrijving;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InschrijvingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inschrijving::all();
    }

    public function headings(): array
    {
        return [
           '#',
           'Voornaam',
           'Achternaam',
           'Email',
           'Telefoon',
           'Geslacht',
           'Geboortedatum',
           'Straat',
           'Nummer',
           'Bus',
           'Postcode',
           'Plaats',
           'Land',
           'Medisch',
           'Voogd 1: Voornaam',
           'Voogd 1: Achternaam',
           'Voogd 1: Email',
           'Voogd 1: Telefoon',
           'Voogd 1: Straat',
           'Voogd 1: Nummer',
           'Voogd 1: Bus',
           'Voogd 1: Postcode',
           'Voogd 1: Plaats',
           'Voogd 1: Land',
           'Voogd 2: Voornaam',
           'Voogd 2: Achternaam',
           'Voogd 2: Email',
           'Voogd 2: Telefoon',
           'Voogd 2: Straat',
           'Voogd 2: Nummer',
           'Voogd 2: Bus',
           'Voogd 2: Postcode',
           'Voogd 2: Plaats',
           'Voogd 2: Land',
        ];
    }
}
