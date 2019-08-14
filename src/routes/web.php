<?php
/*Route::get('Theme', function () {
    echo 'Test Theme!';
}); # WIP*/

// enigma.dev/admin/theme

Route::group(['middleware' => ['web', 'auth', 'Admin'], 'namespace' => 'Enigma', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Theme', 'prefix' => 'theme'], function () {
        Route::any('/', 'Theme@show')->name('theme.test'); # WIP
        //Route::get('/', '\\Enigma\\Theme\\Theme@Test')->name('theme.test'); # WIP
        
        /*Route::get('/', 'ThemeController@index')->name('admin.theme.index'); # WIP
        Route::group(['prefix' => '{id}'], function () { # WIP
            Route::get('edit', 'ThemeController@edit')->name('admin.theme.edit'); # WIP
            Route::get('delete', 'ThemeController@destroy')->name('admin.theme.delete'); # WIP
        });*/
    });
});