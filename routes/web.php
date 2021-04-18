<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//routes details plans
Route::prefix('plans')
    ->group(function () {
        Route::get('{url}/details', 'Admin\DetailPlanController@index')->name('details.plan.index');
        Route::get('{url}/details/create', 'Admin\DetailPlanController@create')->name('details.plan.create');
        Route::post('{url}/details', 'Admin\DetailPlanController@store')->name('details.plan.store');
        Route::get('{url}/details/{idDetail}', 'Admin\DetailPlanController@show')->name('details.plan.show');
        Route::delete('{url}/details/delete/{idDetail}', 'Admin\DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('{url}/details/{idDetail}/edit', 'Admin\DetailPlanController@edit')->name('details.plan.edit');
        Route::put('{url}/details/{idDetail}', 'Admin\DetailPlanController@update')->name('details.plan.update');
    });

//routes plans
Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('plans', 'PlanController@index')->name('plans.index');
        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::put('plans/{url}', 'PlanController@update')->name('plans.update');

        //home dashboard
        Route::get('/', 'PlanController@index')->name('admin.index');
    });
