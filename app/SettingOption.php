<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingOption extends Model
{
    protected $table = 'setting_options';

    protected $fillable = [
        'setting_id', 'value',
    ];

    public function evenement()
    {
        return $this->belongsTo(Setting::class);
    }
}
