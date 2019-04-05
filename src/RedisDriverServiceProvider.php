<?php

namespace Pdeio\RedisDriverFallback;
use Illuminate\Cache\CacheServiceProvider;

class RedisDriverServiceProvider extends CacheServiceProvider
{
    /**
     * @package pdeio/redis-driver-fallback
     *
     * @author Paulo De Iovanna <paulodeiovanna@gmail.com>
     */
    protected $defer = false;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'redis-driver-fallback.php'
        );

        $this->app->singleton('cache', function ($app) {
            return new RedisDriverFallback($app);
        });

        $this->app->singleton('cache.store', function ($app) {
            return $app['cache']->driver();
        });

        $this->app->singleton('memcached.connector', function () {
            return new MemcachedConnector;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('redis-driver-fallback.php'),
            __DIR__.'/mail' => resource_path('views/pdeio/redis-driver-fallback-email-template'),
        ]);
        $this->loadViewsFrom(__DIR__.'/mail', 'RedisDriverFallback');
    }
}
