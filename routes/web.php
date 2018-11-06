<?php

/*
|--------------------------------------------------------------------------
| Task Routes
|--------------------------------------------------------------------------
|
| Listed as follow:
|       -/
|       -/Web-Crawler/
|       --------------/Simple-Task
|       --------------------------/Using-DOM
|       -------------------------------------/a
|       -------------------------------------/b
|       -------------------------------------/c
|       --------------------------/Using-CURL
|       -------------------------------------/a
|       -------------------------------------/b
|       -------------------------------------/c
|       --------------/Advanced-Task
|       ----------------------------/Using-DOM
|       ---------------------------------------/a
|       ---------------------------------------/b
|       ----------------------------/Using-CURL
|       ---------------------------------------/a
|       ---------------------------------------/b
|
|
*/

Route::group([
    'prefix'    => '/',
], function()
{

    Route::get('/', function () {
        return view('landing');
    });

    Route::group([
        'prefix'    => '/Web-Crawler',
    ], function()
    {
        Route::group([
            'prefix'    => '/Simple-Task',
        ], function()
        {
            Route::group([
                'prefix'    => '/Using-DOM',
            ], function()
            {
                Route::get('/a' , ['as' => 'simple-task.dom.a', 'uses' => 'DomSimpleTaskOperator@taskA']);
                Route::get('/b' , ['as' => 'simple-task.dom.b', 'uses' => 'DomSimpleTaskOperator@taskB']);
                Route::get('/c' , ['as' => 'simple-task.dom.c', 'uses' => 'DomSimpleTaskOperator@taskC']);
            });

            Route::group([
                'prefix'    => 'Using-CURL',
            ], function()
            {
                Route::get('/a' , ['as' => 'simple-task.curl.a', 'uses' => 'CurlSimpleTaskOperator@taskA']);
                Route::get('/b' , ['as' => 'simple-task.curl.b', 'uses' => 'CurlSimpleTaskOperator@taskB']);
                Route::get('/c' , ['as' => 'simple-task.curl.c', 'uses' => 'CurlSimpleTaskOperator@taskC']);

            });
        });
        Route::group([
            'prefix'    => '/Advanced-Task',
        ], function()
        {
            Route::group([
                'prefix'    => '/Using-DOM',
            ], function()
            {
                Route::get('/a' , ['as' => 'advanced-task.dom.a', 'uses' => 'DomAdvancedTaskOperator@taskA']);
                Route::get('/b' , ['as' => 'advanced-task.dom.b', 'uses' => 'DomAdvancedTaskOperator@taskB']);
            });

            Route::group([
                'prefix'    => 'Using-CURL',
            ], function()
            {
                Route::get('/a' , ['as' => 'advanced-task.curl.a', 'uses' => 'CurlAdvancedTaskOperator@taskA']);
                Route::get('/b' , ['as' => 'advanced-task.curl.b', 'uses' => 'CurlAdvancedTaskOperator@taskB']);
            });
        });
    });

});
