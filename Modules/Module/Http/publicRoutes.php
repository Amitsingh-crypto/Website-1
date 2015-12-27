<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['middleware' => 'logged.in'], function (Router $router) {
    $router->bind('singleModule', function ($id) {
        return app(\Modules\Module\Repositories\ModuleRepository::class)->find($id);
    });
    get('account/modules', ['uses' => 'Frontend\ModuleController@index', 'as' => 'p.modules.index']);
    get('account/modules/create', ['uses' => 'Frontend\ModuleController@create', 'as' => 'p.modules.create']);
    post('account/modules', ['uses' => 'Frontend\ModuleController@store', 'as' => 'p.modules.store']);
    get('account/modules/{singleModule}/createGallery', ['uses' => 'Frontend\ModuleController@createGallery', 'as' => 'p.modules.createGallery']);
    get('account/modules/{singleModule}/edit', ['uses' => 'Frontend\ModuleController@edit', 'as' => 'p.modules.edit']);
    post('account/modules/{singleModule}', ['uses' => 'Frontend\ModuleController@update', 'as' => 'p.modules.update']);
});
