<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TakIdentity extends Model
{
    use SoftDeletes;

    protected $table = 'tak_identities';

    protected $fillable = [
        'tak_id', 'identity_id', 'contact_volgorde',
    ];

    public function tak()
    {
        return $this->belongsTo(Tak::class);
    }

    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }
}
