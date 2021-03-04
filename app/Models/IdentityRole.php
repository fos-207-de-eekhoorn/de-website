<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdentityRole extends Model
{
    use SoftDeletes;

    protected $table = 'identity_roles';

    protected $fillable = [
        'identity_id', 'role_id',
    ];

    public function identity()
    {
        return $this->hasOne(Identity::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
