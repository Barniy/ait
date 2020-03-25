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

Route::group(['middleware' => 'cors'], function () {
    Route::resource('users', 'Admin\UserController');
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('permissions', 'Admin\PermissionController');
    Route::resource('patients', 'Patient\PatientController');
    Route::post('searchPatient', 'Patient\PatientController@searchPatient');
    Route::post('patients/addPatientToDepartment', 'Patient\PatientController@addPatientToDepartment');
    Route::post('patients/addLabRequest', 'Patient\PatientController@addLabRequest');
    Route::post('patients/addImagingRequest', 'Patient\PatientController@addImagingRequest');
    Route::resource('vitals', 'VitalController');
    Route::resource('languages', 'LanguageController');
    Route::post('attributeExamination', 'AttributeExaminationController@index');
    Route::resource('attributeConditions', 'AttributeConditionController');
    Route::resource('appointments', 'AppointmentController');
    Route::post('patientImagingRequests', 'ImagingRequestController@show');
    Route::post('patientLabRequests', 'LabRequestController@show');
    Route::resource('labRequests', 'LabRequestController');
    Route::post('labRequests', 'LabRequestController@index');
    Route::post('ImagingRequests', 'ImagingRequestController@index');
    Route::resource('departments', 'DepartmentController');
    Route::resource('tempPatients', 'TempPatientController');
});
