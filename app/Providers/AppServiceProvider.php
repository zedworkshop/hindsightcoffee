<?php

namespace Hindsight\Providers;

use Hindsight\Tweets\Services\TwitterStream;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwitterStream::class, function ($app) {
            $twitter_access_token = config('services.twitter.access_token');
            $twitter_access_token_secret = config('services.twitter.access_token_secret');

            return new TwitterStream($twitter_access_token, $twitter_access_token_secret);
        });
    }
}
