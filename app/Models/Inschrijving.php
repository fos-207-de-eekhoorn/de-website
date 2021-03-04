<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'inschrijvingen';

    protected $fillable = [
        'voornaam',
        'achternaam',
        'email',
        'telefoon',
        'geslacht',
        'geboortedatum',
        'straat',
        'nummer',
        'bus',
        'postcode',
        'plaats',
        'land',
        'medisch',
        'beeldmateriaal',
        'voogd_1_voornaam',
        'voogd_1_achternaam',
        'voogd_1_email',
        'voogd_1_telefoon',
        'voogd_1_straat',
        'voogd_1_nummer',
        'voogd_1_bus',
        'voogd_1_postcode',
        'voogd_1_plaats',
        'voogd_1_land',
        'voogd_2_voornaam',
        'voogd_2_achternaam',
        'voogd_2_email',
        'voogd_2_telefoon',
        'voogd_2_straat',
        'voogd_2_nummer',
        'voogd_2_bus',
        'voogd_2_postcode',
        'voogd_2_plaats',
        'voogd_2_land',
    ];
}
