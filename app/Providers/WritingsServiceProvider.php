<?php

namespace App\Providers;

use App\Contracts\WritingsContract;
use App\Repositories\LoremIpsumWritingsRepository;
use App\Repositories\WritingsRepository;
use Illuminate\Support\ServiceProvider;

class WritingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(WritingsContract::class, function (){

            return new WritingsRepository();
        });

//        $this->app->bind(WritingsContract::class, function (){
//
//            return new LoremIpsumWritingsRepository();
//        });
    }
}
