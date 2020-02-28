<?php

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

Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard/month/{date}', 'DashboardController@month')->name('dashboard.filter.month');
Route::get('/dashboard/week/{date}', 'DashboardController@week')->name('dashboard.filter.week');
Route::get('/dashboard/day/{date}', 'DashboardController@day')->name('dashboard.filter.day');

