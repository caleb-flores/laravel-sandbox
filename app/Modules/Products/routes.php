<?php

Route::group(array('module' => 'Products', 'namespace' => 'App\Modules\Products\Controllers','middleware' => 'web'), function() {

    Route::resource('Products', 'ProductsController');
    
});	