<?php

Route::group([
    'middleware' => config('platform.middleware.private'),
    'prefix'     => 'dashboard/systems',
    'namespace'  => 'Orchid\Monitor',
],
    function (\Illuminate\Routing\Router $router) {
        $router->get('monitor', [
            'as'   => 'dashboard.systems.monitor',
            'uses' => 'MonitorController@index',
        ]);
    });
