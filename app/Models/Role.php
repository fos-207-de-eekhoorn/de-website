<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'name', 'key',
    ];

    public function identities()
    {
        return $this->hasManyThrough(
            Identity::class,
            IdentityRole::class,
            'role_id',
            'id',
            'id',
            'identity_id'
        );
    }
}
