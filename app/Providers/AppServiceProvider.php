<?php

namespace App\Providers;

use App\Models\Tak;
use App\Models\Evenement;
use App\Models\Setting;
use App\Http\Shared\CommonHelpers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    use CommonHelpers;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        setlocale(LC_TIME, config('app.locale'));
        Carbon::setLocale(config('app.locale'));

        $takken = Tak::get();
        $evenementen = Evenement::where('active', '1')
            ->whereDate('eind_datum', '>=', Carbon::now('Europe/Berlin')->format('Y-m-d'))
            ->orderBy('start_datum','ASC')
            ->get();
        $corona_phase = Setting::where('key', 'active_corona_phase')->first()->value;

        View::share([
            'el' => $this->get_el(),
            'takken' => $takken,
            'evenementen' => $evenementen,
            'active_corona_phase' => $corona_phase,
        ]);
    }
}
