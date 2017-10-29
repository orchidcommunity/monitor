<?php

Route::group([
    'middleware' => ['web', 'dashboard', 'access'],
    'prefix'     => 'dashboard/systems',
    'namespace'  => 'Orchid\Monitor',
],
    function (\Illuminate\Routing\Router $router) {
        $router->get('monitor', [
            'as'   => 'dashboard.systems.monitor',
            'uses' => 'MonitorController@index',
        ]);
    });
