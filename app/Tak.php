<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tak extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'naam', 'foto',
    ];

    public function tak_leiding()
    {
        return $this->hasMany(TakLeiding::class);
    }

    public function activiteit()
    {
        return $this->hasMany(Activiteit::class);
    }
}
