<?php

namespace App\Providers;

use App\Tak;
use App\Evenement;
use App\Setting;
use App\Http\Shared\CommonHelpers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    use CommonHelpers;

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
            ->whereDate('start_datum', '>=', Carbon::now('Europe/Berlin')->format('Y-m-d'))
            ->orderBy('start_datum','ASC')
            ->get();

        View::share([
            'el' => $this->get_el(),
            'navigation_takken' => $takken,
            'navigation_evenementen' => $evenementen,
            'takken' => Tak::get(),
            'active_corona_phase' => Setting::where('key', 'active_corona_phase')->first()->value,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
