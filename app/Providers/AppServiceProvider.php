<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('hetzner_ip', function ($attribute, $value, $parameters, $validator) {
            return \Cache::remember('validation_'.$value, 60 * 24 * 10, function () use ($value) {
                try {
                    $client = new Client();
                    $response = $client->get("https://get.geojs.io/v1/ip/geo/".$value.".json");

                    $response = \GuzzleHttp\json_decode((string) $response->getBody());
                    if (str_contains($response->organization, 'Hetzner')) {
                        return true;
                    }

                    return false;
                } catch (\Exception $e) {
                    return false;
                }
            });
        });
        require __DIR__.'/../functions.php';
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
