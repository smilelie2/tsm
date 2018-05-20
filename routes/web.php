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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

//============ Only Nisit ===============
Route::get('/home', 'CheckTypeController@check_type');

Route::get('/nisit', 'Nisit\NisitController@getWorkAll');

Route::get('/nisit/book/{id}', 'Nisit\NisitController@book');

Route::get('/nisit/savenisit/{id}', 'Nisit\NisitController@saving');

Route::post('/nisit' ,['as' => 'nisit', "uses" => "Nisit\NisitController@saved" ]);

Route::get('/nisit/savednisit/{id}', function (){
    return View::make('/nisit');
});
// =======================================

// ============ Only Staff ===============
Route::get('/staff', 'Staff\StaffController@getYourWork');

Route::get('/staff/create', function () {
    return View::make('/staff/creating');
});

Route::get('/staff/savestaff/{id}', 'Nisit\NisitController@saving');
Route::get('/nisit/savedstaff/{id}', function (){
    return View::make('/staff');
});

Route::post('/staff' ,['as' => 'staff', "uses" => "Staff\StaffController@createWork" ]);
//========================================


// ============ Only Assessor ============
Route::get('/assessor', function (){
    return View::make('/assessor/assessor');
});

Route::get('/assessor/nisitStatistic/' ,['as' => 'assessor/nisitStatistic', "uses" => "Assessor\AssessorController@getHoursNisit" ]);
Route::get('/assessor/nisitStatistic/{id}/', "Assessor\AssessorController@getHistory");

Route::get('/assessor/setdate',"Assessor\AssessorController@showSetDateForm")->name('assessor/setdate');
Route::post('/assessor/setdate',"Assessor\AssessorController@setDate");

Route::get('/assessor/manage',"Assessor\AssessorController@showManageForm")->name('manage');
Route::get('/assessor/manage/{id}',"Assessor\AssessorController@showEditForm")->name('edit');
Route::post('/assessor/manage/{id}',"Assessor\AssessorController@Edit");

Route::get('assessor/add/{id}',"Assessor\AssessorController@Add")->name('add');

Route::get('assessor/del/{id}',"Assessor\AssessorController@Del")->name('del');

Route::get('/assessor/nisitInYear',"Assessor\AssessorController@showNisitInYearForm")->name('nisitInYear'); // route setting Nisit in YearSchool

Route::get('/assessor/workStatistic' ,['as' => 'assessor/workStatistic', "uses" => "Assessor\AssessorController@getWorkStatistic" ]);


//=======================================