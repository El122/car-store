<?php

namespace App\Providers;

use App\Models\Drive;
use App\Models\EngineType;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        $drive = Drive::all();
        $engins = EngineType::all();

        View::share(["drive" => $drive, "engins" => $engins]);
    }
}
