<?php

namespace RazorMeister\Installer;

use Illuminate\Support\ServiceProvider;

class InstallerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('RazorMeister\Installer\Controllers\InstallerController');
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'installer');

        $this->app['router']->aliasMiddleware('checkPackages', \RazorMeister\Installer\Middleware\CheckPackages::class);
        $this->app['router']->aliasMiddleware('checkPermissions', \RazorMeister\Installer\Middleware\CheckPermissions::class);
        $this->app['router']->aliasMiddleware('checkSettings', \RazorMeister\Installer\Middleware\CheckSettings::class);
        $this->app['router']->aliasMiddleware('checkAccount', \RazorMeister\Installer\Middleware\CheckAccount::class);
        $this->app['router']->aliasMiddleware('checkIfInstalled', \RazorMeister\Installer\Middleware\CheckIfInstalled::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/Views/', 'installer');
        $this->loadTranslationsFrom(__DIR__.'/Lang/', 'installer');

        $this->publishes([
            __DIR__.'/Assets/' => public_path('vendor/installer'),
        ], 'laravelInstaller');

        $this->publishes([
            __DIR__.'/../config/config.php' => base_path('config/installer.php'),
        ], 'laravelInstaller');

        $this->publishes([
            __DIR__.'/Lang/' => resource_path('lang/vendor/installer'),
        ], 'laravelInstaller');
    }
}
