<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Carbon::macro('isValidDate', function ($date) {
            $dateParts = explode('-', $date);
            if (count($dateParts) !== 3) return false;

            [$day, $month, $year] = $dateParts;

            if (mb_strlen($year) !== 4) return false;
            if (mb_strlen($month) !== 2) return false;
            if (mb_strlen($day) !== 2) return false;

            return checkdate((int) $month, (int) $day, (int) $year);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
