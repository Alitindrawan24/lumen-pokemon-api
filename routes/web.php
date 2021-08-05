<?php

$router->group(['prefix' => 'V1', 'namespace' => 'V1'], function () use ($router) {
    $router->group(['prefix' => 'pokedex'], function () use ($router) {
        $router->get('/', 'PokedexController@index');
        $router->get('/{pokedex_number}', 'PokedexController@show');
    });
    $router->group(['prefix' => 'item'], function () use ($router) {
        $router->get('/', 'ItemController@index');
        $router->get('/{id}', 'ItemController@show');
    });
    $router->group(['prefix' => 'move'], function () use ($router) {
        $router->get('/', 'MoveController@index');
        $router->get('/{id}', 'MoveController@show');
    });
    $router->group(['prefix' => 'type'], function () use ($router) {
        $router->get('/', 'TypeController@index');
        $router->get('/{id}', 'TypeController@show');
    });
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
