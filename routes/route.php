<?php

Route::group([
    'middleware' => config('platform.middleware.private'),
    'prefix'     => \Orchid\Platform\Kernel\Dashboard::prefix('/systems'),
    'namespace'  => 'Orchid\Monitor',
],
    function (\Illuminate\Routing\Router $router) {
        $router->get('monitor', [
            'as'   => 'dashboard.systems.monitor',
            'uses' => 'MonitorController@index',
        ]);
    });
