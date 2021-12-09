<?php

namespace App\Modules\User\Providers;

use App\Modules\Setting\Entities\Setting;
use View;
use Illuminate\Support\Facades\Auth;  

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Modules\User\Repositories\UserInterface;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Repositories\RoleInterface;
use App\Modules\User\Repositories\RoleRepository;
use App\Modules\User\Repositories\UserRoleInterface;
use App\Modules\User\Repositories\UserRoleRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->userRegister();
        $this->RoleRegister();
        $this->UserRoleRegister();
    }
    
    public function userRegister(){
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );
    }
    
    public function RoleRegister(){
        $this->app->bind(
            RoleInterface::class,
            RoleRepository::class
        );
    }
    
    public function UserRoleRegister(){
        $this->app->bind(
            UserRoleInterface::class,
            UserRoleRepository::class
        );
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('user.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'user'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/user');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/user';
        }, \Config::get('view.paths')), [$sourcePath]), 'user'); 

        View::composer('user::login.login', function ($view) {
           $setting=Setting::find(1);
            $view->with('setting', $setting);
        });
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/user');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'user');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'user');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
