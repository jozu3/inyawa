<?php

namespace App\Providers;

use Illuminate\View\ViewServiceProvider;

class BladeFiltersServiceProvider extends ViewServiceProvider
{
    public function registerBladeCompiler()
    {
        $this->app->singleton('blade.compiler', function ($app) {
            return tap(new BladeFiltersCompiler($app['files'], $app['config']['view.compiled']), function ($blade) {
                $blade->component('dynamic-component', DynamicComponent::class);
            });
        });
    }
}
