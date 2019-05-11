<?php

namespace PingCheng\ApiResponse;

use Illuminate\Support\ServiceProvider;


/**
 * Class ApiResponseServiceProvider
 */
class ApiResponseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        $this->app->singleton('api_response', function() {
            return new ApiResponse();
        });
    }
}