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
        $evenementen = Evenement::whereDate('start_datum', '>=', Carbon::now('Europe/Berlin')->format('Y-m-d'))
            ->get();

        View::share([
            'el' => $this->get_el(),
            'takken' => $takken,
            'evenementen' => $evenementen,
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
