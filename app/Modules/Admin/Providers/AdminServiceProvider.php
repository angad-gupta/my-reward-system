<?php

namespace App\Modules\Admin\Providers;

use App\Modules\Setting\Entities\Setting;
use View;
use Illuminate\Support\Facades\Auth;    

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use App\Modules\Notification\Entities\Notification;


class AdminServiceProvider extends ServiceProvider
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
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('admin.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'admin'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/admin');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/admin';
        }, \Config::get('view.paths')), [$sourcePath]), 'admin');
        
        
        
        View::composer('admin::layout', function ($view) {

            $user = Auth::user();
            $id = $user->id;
            $count_notification = Notification::where('is_read','=','0')->where('notified_user_id', '=' , $id)->count();
            $list_notification = Notification::where('notified_user_id', '=' ,$id)->take(10)->orderBy('id', 'DESC')->get();
            
            $notification = array('count_notification'=>$count_notification,'list_notification'=>$list_notification);
            
            $view->with('notification', $notification);

       });

        View::composer('admin::layout', function ($view) {

            $user = Auth::user();
            $id = $user->id;
            $count_notification = Notification::where('is_read','=','0')->where('notified_user_id', '=' , $id)->count();
            $list_notification = Notification::where('notified_user_id', '=' ,$id)->take(10)->orderBy('id', 'DESC')->get();

            $notification = array('count_notification'=>$count_notification,'list_notification'=>$list_notification);

            $view->with('notification', $notification);

        });


        View::composer('admin::layout', function ($view) {
           $setting=Setting::find(1);
//           dd($setting);
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
        $langPath = resource_path('lang/modules/admin');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'admin');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'admin');
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
