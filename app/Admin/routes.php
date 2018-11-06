<?php

use Illuminate\Routing\Router;

\Illuminate\Support\Facades\App::setLocale('az');

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('branches', BranchController::class);
    $router->resource('carousel', CarouselItemController::class);
    $router->resource('departments', DepartmentController::class);
    $router->resource('services', ServiceController::class);
    $router->resource('settings', SettingsController::class);
    $router->resource('positions', PositionController::class);

});
