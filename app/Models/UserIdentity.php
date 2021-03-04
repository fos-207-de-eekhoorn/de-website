<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserIdentity extends Model
{
    use SoftDeletes;

    protected $table = 'user_identities';

    protected $fillable = [
        'user_id', 'identity_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function identity()
    {
        return $this->hasOne(Identity::class);
    }
}
