<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Identity extends Model
{
    use SoftDeletes;

    protected $table = 'identities';

    protected $fillable = [
        'voornaam', 'achternaam', 'voortotem', 'totem', 'welpennaam', 'email', 'geslacht', 'telefoon', 'foto',
    ];

    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            UserIdentity::class,
            'user_id',
            'id',
            'id',
            'identity_id'
        );
    }

    public function roles()
    {
        return $this->hasManyThrough(
            Role::class,
            IdentityRole::class,
            'identity_id',
            'id',
            'id',
            'role_id'
        );
    }

    public function tak()
    {
        return $this->hasOneThrough(
            Tak::class,
            TakIdentity::class,
            'identity_id',
            'id',
            'id',
            'tak_id'
        );
    }

    public function getIsTlAttribute()
    {
        return sizeof($this->roles->filter(function ($value, $key) { 
            return $value['key'] == config('roles.keys.tl'); 
        })) > 0;
    }

    public function getIsElAttribute()
    {
        return sizeof($this->roles->filter(function ($value, $key) { 
            return $value['key'] == config('roles.keys.el'); 
        })) > 0;
    }

    public function getIsElLedenAttribute()
    {
        return sizeof($this->roles->filter(function ($value, $key) { 
            return $value['key'] == config('roles.keys.el_leden');
        })) > 0;
    }

    public function getIsElFinancienAttribute()
    {
        return sizeof($this->roles->filter(function ($value, $key) { 
            return $value['key'] == config('roles.keys.el_financien');
        })) > 0;
    }

    public function getTelefoonLinkAttribute()
    {
        return str_replace(".", "", str_replace("/", "", $this->telefoon));
    }
}
