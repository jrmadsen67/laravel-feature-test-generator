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


            $this->publishes([
                __DIR__.'/stubs/resource_feature_tests.stub' => config_path('feature-test-generator/stubs/resource_feature_tests.stub')
            ], 'stubs');

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
    }
}
