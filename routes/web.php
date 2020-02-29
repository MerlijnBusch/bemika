<?php

Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard/month/{date}', 'DashboardController@month')->name('dashboard.filter.month');
Route::get('/dashboard/week/{date}', 'DashboardController@week')->name('dashboard.filter.week');
Route::get('/dashboard/day/{date}', 'DashboardController@day')->name('dashboard.filter.day');

Route::get('/patient/show/{patient}', 'PatientController@show')->name('patient.show');
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/store', 'PatientController@store')->name('patient.store');

Route::get('/activity/create', 'AcitivtyController@create')->name('activity.create');
Route::post('/activity/store', 'AcitivtyController@store')->name('activity.store');
