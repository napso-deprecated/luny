<?php

namespace App\Providers;

use App\luny\ThemeViewFinder;
use App\Page;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Napso\Lunytags\Models\Tag;

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


        // we basiclly say, every time the sidebar view is loaded then we want to pass to it the archives variable.

        view()->composer('layouts.partial.sidebar', function ($view) {
            $view->with('archives', Page::getArchives());
        });


        view()->composer('layouts.partial.tags', function ($view) {
            $view->with('tags', Tag::all());
        });

        $this->app['view']->setFinder($this->app['theme.finder']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('theme.finder', function ($app) {

            $finder = new ThemeViewFinder($app['files'], $app['config']['view.paths']);
            $config = $app['config']['luny.theme'];

            // hints for email notifications.
            $laravelOriginalViewFinder = $this->app['view']->getFinder();
            $finder->setHints($laravelOriginalViewFinder->getHints());

            $finder->setActiveTheme($config['active']);
            return $finder;
        });
    }
}
