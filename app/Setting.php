<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'key', 'value',
    ];

    public function setting_options()
    {
        return $this->hasMany(SettingOption::class);
    }
}
