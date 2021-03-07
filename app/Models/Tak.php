<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Tak extends Model
{
    use SoftDeletes;

    protected $table = 'takken';

    protected $fillable = [
        'naam', 'foto', 'introductie', 'beschrijving', 'activiteiten_beschrijving', 'vanaf',
    ];

    protected static function boot()
    {
        parent::boot();

        $order = '"'.implode('","', config('takken.sort_order')).'"';
        static::addGlobalScope('order', function (Builder $builder) use ($order) {
            $builder->orderByRaw("FIELD(`slug`, $order)");
        });
    }

    public function identities()
    {
        return $this->hasManyThrough(
            Identity::class,
            TakIdentity::class,
            'tak_id',
            'id',
            'id',
            'identity_id'
        );
    }

    public function activiteiten()
    {
        return $this->hasMany(Activiteit::class)->orderBy('datum', 'asc');
    }

    public function volgende_activiteit()
    {
        return $this->activiteiten()
            ->whereDate('datum', '>=', Carbon::now('Europe/Berlin')->format('Y-m-d'));
    }

    public function getTlAttribute()
    {
        $identities = $this->identities()
            ->with('tak')
            ->get();
        foreach($identities as $identity) {
            if ($identity->is_tl) return $identity;
        }
    }
}
