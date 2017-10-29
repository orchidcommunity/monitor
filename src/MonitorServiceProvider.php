<?php

namespace Orchid\Monitor;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Kernel\Dashboard;

class MonitorServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'orchid/monitor');
        $this->loadTranslationsFrom(realpath(__DIR__.'/../resources/lang'), 'orchid/monitor');
        $this->loadRoutesFrom(realpath(__DIR__.'/../routes/route.php'));

        $dashboard = $this->app->make(Dashboard::class);

        $dashboard->permission->registerPermissions([
            'Systems' => [[
                'slug'        => 'dashboard.systems.monitor',
                'description' => trans('cms::permission.systems.monitor'),
            ]],
        ]);

        View::composer('dashboard::layouts.dashboard', function () use ($dashboard) {
            $dashboard->menu->add('Systems', [
                'slug'       => 'monitor',
                'icon'       => 'fa fa-television',
                'route'      => route('dashboard.systems.monitor'),
                'label'      => trans('orchid/monitor::monitor.Monitor'),
                'permission' => 'dashboard.systems.monitor',
                'sort'       => 502,
            ]);
        });
    }
}
