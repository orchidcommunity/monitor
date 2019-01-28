<?php

declare(strict_types=1);

namespace Orchid\Monitor;

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;

class MonitorServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot(Dashboard $dashboard)
    {
        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'orchid/monitor');
        $this->loadTranslationsFrom(dirname(__DIR__) . '/resources/lang', 'orchid/monitor');

        $dashboard->registerPermissions([
            'Systems' => [[
                'slug'        => 'dashboard.systems.monitor',
                'description' => trans('orchid/monitor::monitor.Monitor'),
            ]],
        ]);


        View::composer('platform::container.systems.index', function () use ($dashboard) {
            $dashboard->menu
                ->add('Tools', ItemMenu::setLabel(__('Monitor'))
                    ->setSlug('Monitor')
                    ->setIcon('icon-refresh')
                    ->setRoute(route('dashboard.systems.monitor'))
                    ->setPermission('dashboard.systems.monitor')
                    ->setSort(2000));
        });

        Route::domain((string) config('platform.domain'))
            ->prefix(Dashboard::prefix('/systems'))
            ->middleware(config('platform.middleware.private'))
            ->group(function ($route) {
                $route->screen('monitor', MonitorScreen::class)
                    ->name('dashboard.systems.monitor');
            });

        Breadcrumbs::for('dashboard.systems.monitor', function ($trail) {
            $trail->parent('platform.systems.index');
            $trail->push(__('Menu'), route('dashboard.systems.monitor'));
        });

    }
}
