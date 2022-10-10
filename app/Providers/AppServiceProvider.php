<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        // this way for forget fillables and guardeds
        Model::unguard();

        Response::macro('success', function ($msg, $data = null) {
            return response()->json([
                'success' => true,
                'message' => $msg,
                'data' => $data
            ], 200);
        });

        Response::macro('error', function ($msg, $status_code = 400) {
            return response()->json([
                'success' => false,
                'message' => $msg,
            ], $status_code);
        });
    }
}
