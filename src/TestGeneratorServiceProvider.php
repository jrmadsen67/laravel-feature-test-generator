<?php

namespace jrmadsen67\FeatureTestGenerator;

use Illuminate\Support\ServiceProvider;

class TestGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

//            $this->publishes([
//                __DIR__.'/../config/config.php' => config_path('debug-server.php'),
//            ], 'config');

            $this->commands([
                TestGeneratorCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'debug-server');

//        $this->app->bind('feature-test:generate', TestGeneratorCommand::class);

//        $this->commands([
//            'command.dumpserver',
//        ]);

//        $host = $this->app['config']->get('debug-server.host');

    }
}
