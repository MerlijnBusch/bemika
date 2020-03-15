<?php

Auth::routes(['verify' => true]);

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard/month/{date}', 'DashboardController@month')->name('dashboard.filter.month');
Route::get('/dashboard/week/{date}', 'DashboardController@week')->name('dashboard.filter.week');
Route::get('/dashboard/day/{date}', 'DashboardController@day')->name('dashboard.filter.day');
Route::get('/dashboard/patient/profile/{id}', 'PatientController@edit')->name('dashboard.patient.profile');
Route::get('/dashboard/patient/calender/{id}', 'DashboardController@patientCalender')->name('dashboard.patient.calender');
Route::get('/dashboard/patient/summary/{id}', 'DashboardController@patientSummary')->name('dashboard.patient.summary');

Route::get('/dashboard/patient/tasks1/{id}', 'DashboardController@patientTasksFirst')->name('dashboard.patient.tasks.first');
Route::get('/dashboard/patient/tasks2/{id}', 'DashboardController@patientTasksSecond')->name('dashboard.patient.tasks.second');
Route::get('/dashboard/patient/tasks3/{id}', 'DashboardController@patientTasksThird')->name('dashboard.patient.tasks.third');
Route::post('/dashboard/patient/tasks1/{id}', 'DashboardController@patientTasksPostFirst')->name('dashboard.patient.tasks.first.post');
Route::post('/dashboard/patient/tasks2/{id}', 'DashboardController@patientTasksPostSecond')->name('dashboard.patient.tasks.second.post');
Route::post('/dashboard/patient/tasks3/{id}', 'DashboardController@patientTasksPostThird')->name('dashboard.patient.tasks.third.post');

Route::get('/patient', 'PatientController@get')->name('patient.get');
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/store', 'PatientController@store')->name('patient.store');
Route::patch('/patient/update/{id}', 'PatientController@update')->name('patient.update');

Route::get('/activity/index', 'ActivityController@index')->name('activity.index');
Route::get('/activity/view/{id}', 'ActivityController@show')->name('activity.view');
Route::get('/activity/create', 'ActivityController@create')->name('activity.create');
Route::post('/activity/store', 'ActivityController@store')->name('activity.store');
Route::get('/activity/edit/{id}', 'ActivityController@edit')->name('activity.edit');
Route::patch('/activity/edit/{id}', 'ActivityController@update')->name('activity.update');
Route::delete('/activity/delete/{id}', 'ActivityController@destroy')->name('activity.destroy');

Route::get('/user/settings/profile', 'UserController@index')->name('user.profile');
Route::patch('/user/settings/profile/update/{id}', 'UserController@store')->name('user.profile.update');
Route::post('/user/settings/language', 'UserController@setLanguage')->name('user.setLanguage');

Route::get('/verified', 'VerifiedController@index')->name('verified');
Route::post('/verified', 'VerifiedController@store')->name('verified.store');


Route::post('/hide-payment-footer', 'PaymentController@hidePaymentFooter')->name('payment.footer');


Route::get('/placeholder', function () {
    return redirect()->back();
})->name('placeholder');

Route::post('/placeholder', function () {
    return redirect()->back();
})->name('placeholder.post');
