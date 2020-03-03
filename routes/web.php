<?php

Auth::routes(['verify' => true]);

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard/month/{date}', 'DashboardController@month')->name('dashboard.filter.month');
Route::get('/dashboard/week/{date}', 'DashboardController@week')->name('dashboard.filter.week');
Route::get('/dashboard/day/{date}', 'DashboardController@day')->name('dashboard.filter.day');
Route::get('/dashboard/patient/profile/{id}', 'PatientController@edit')->name('dashboard.patient.profile');
Route::get('/dashboard/patient/tasks/{id}', 'DashboardController@patientTasks')->name('dashboard.patient.tasks');
Route::get('/dashboard/patient/calender/{id}', 'DashboardController@patientCalender')->name('dashboard.patient.calender');
Route::get('/dashboard/patient/summary/{id}', 'DashboardController@patientSummary')->name('dashboard.patient.summary');

Route::get('/patient', 'PatientController@get')->name('patient.get');
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/store', 'PatientController@store')->name('patient.store');
Route::patch('/patient/update/{id}', 'PatientController@update')->name('patient.update');

Route::get('/activity/create', 'ActivityController@create')->name('activity.create');
Route::post('/activity/store', 'ActivityController@store')->name('activity.store');

Route::get('/user/settings/profile', 'UserController@index')->name('user.profile');
Route::post('/user/settings/language', 'UserController@setLanguage')->name('user.setLanguage');

Route::get('/verified', 'VerifiedController@index')->name('verified');
Route::post('/verified', 'VerifiedController@store')->name('verified.store');
