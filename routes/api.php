<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::resource('users', 'Admin\UserController');
Route::resource('roles', 'Admin\RoleController');
Route::resource('permissions', 'Admin\PermissionController');
Route::resource('patients', 'Patient\PatientController');
Route::post('patients/addPatientToDepartment', 'Patient\PatientController@addPatientToDepartment');
Route::post('patients/addLabRequest', 'Patient\PatientController@addLabRequest');
Route::post('patients/addImagingRequest', 'Patient\PatientController@addImagingRequest');
Route::resource('vitals', 'VitalController');
Route::resource('languages', 'LanguageController');
Route::resource('attributeExamination', 'AttributeExaminationController');
Route::resource('attributeConditions', 'AttributeConditionController');
Route::get('patientImagingRequests', 'ImagingRequestController@show');
Route::get('patientLabRequests', 'LabRequestController@show');
