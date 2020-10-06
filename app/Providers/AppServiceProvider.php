<?php

namespace App\Providers;

use App\Tak;
use App\Evenement;
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

        $takken = Tak::get();
        $evenementen = Evenement::where('active', '1')
            ->whereDate('start_datum', '>=', Carbon::now('Europe/Berlin')->format('Y-m-d'))
            ->orderBy('start_datum','ASC')
            ->get();

        View::share([
            'el' => $this->get_el(),
            'navigation_takken' => $takken,
            'navigation_evenementen' => $evenementen,
        ]);
        Carbon::setLocale(config('app.locale'));
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
