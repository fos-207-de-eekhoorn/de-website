<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Leider extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'leiding';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voornaam', 'achternaam', 'totem', 'email', 'password', 'telefoon', 'foto', 'is_el', 'is_ael',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function leiding_tak()
    {
        return $this->hasMany(LeiderTak::class);
    }
}