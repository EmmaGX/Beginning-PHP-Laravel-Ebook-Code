<?php

Auth::routes();

Route::get('/', function () {
    return redirect()->route('inventory.home');
});

Route::group(['prefix' => 'app','middleware' => 'auth'],function($route){
    $route->get('/', 'AppController@dashboard')
        ->name('inventory.home');
    $route->get('/create', 'InventoryController@createInventory')
        ->name('inventory.create');
    $route->post('/create', 'InventoryController@storeInventory')
        ->name('inventory.store');
    $route->get('/inventories', 'InventoryController@viewInventories')
        ->name('inventory.all');
});