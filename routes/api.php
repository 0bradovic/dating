<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/', 'AdminController@index')->name('admin.dashboard');

        Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
        Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

        Route::post('/employees', 'AdminController@createEmployee')->name('admin.employee.create');
        Route::get('/employees', 'AdminController@selectEmployee')->name('admin.employee.select');
        Route::patch('/employees', 'AdminController@updateEmployee')->name('admin.employee.update');
        Route::delete('/employees', 'AdminController@deleteEmployee')->name('admin.employee.delete');

        Route::post('/clients', 'AdminController@createClient')->name('admin.client.create');
        Route::get('/clients', 'AdminController@selectClient')->name('admin.client.select');
        Route::patch('/clients', 'AdminController@updateClient')->name('admin.client.update');
        Route::delete('/clients', 'AdminController@deleteClient')->name('admin.client.delete');

        Route::post('/transactionTypes', 'AdminController@createTransactionType')->name('admin.transactionType.create');
        Route::get('/transactionTypes', 'AdminController@selectTransactionType')->name('admin.transactionType.select');
        Route::patch('/transactionTypes', 'AdminController@updateTransactionType')->name('admin.transactionType.update');
        Route::delete('/transactionTypes', 'AdminController@deleteTransactionType')->name('admin.transactionType.delete');

        Route::post('/employeeTypes', 'AdminController@createEmployeeType')->name('admin.employeeType.create');
        Route::get('/employeeTypes', 'AdminController@selectEmployeeType')->name('admin.employeeType.select');
        Route::patch('/employeeTypes', 'AdminController@updateEmployeeType')->name('admin.employeeType.update');
        Route::delete('/employeeTypes', 'AdminController@deleteEmployeeType')->name('admin.employeeType.delete');

        Route::post('/clientTypes', 'AdminController@createClientType')->name('admin.clientType.create');
        Route::get('/clientTypes', 'AdminController@selectClientType')->name('admin.clientType.select');
        Route::patch('/clientTypes', 'AdminController@updateClientType')->name('admin.clientType.update');
        Route::delete('/clientTypes', 'AdminController@deleteClientType')->name('admin.clientType.delete');

        Route::post('/interests', 'AdminController@createInterest')->name('admin.interest.create');
        Route::get('/interests', 'AdminController@selectInterest')->name('admin.interest.select');
        Route::patch('/interests', 'AdminController@updateInterest')->name('admin.interest.update');
        Route::delete('/interests', 'AdminController@deleteInterest')->name('admin.interest.delete');

    });
});

Route::prefix('employee')->group(function () {

    Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
    Route::post('/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');
    
    Route::middleware(['auth:employee'])->group(function () {

        Route::get('/', 'EmployeeController@index')->name('employee.dashboard');
        Route::get('/object', 'Auth\EmployeeLoginController@getEmployeeByToken')->name('employee.object');

        Route::get('/register', 'Auth\EmployeeRegisterController@showRegisterForm')->name('employee.register');
        Route::post('/register', 'Auth\EmployeeRegisterController@register')->name('employee.register.submit');

        Route::post('/messages', 'EmployeeController@createMessage')->name('employee.message.create');
        Route::get('/messages', 'EmployeeController@selectMessage')->name('employee.message.select');
        Route::patch('/messages', 'EmployeeController@updateMessage')->name('employee.message.update');
        Route::delete('/messages', 'EmployeeController@deleteMessage')->name('employee.message.delete');

        Route::post('/photos', 'EmployeeController@createEmployeePhoto')->name('employee.photo.create');
        Route::get('/photos', 'EmployeeController@selectEmployeePhoto')->name('employee.photo.select');
        Route::get('/photos/all', 'EmployeeController@selectEmployeePhotoAll')->name('employee.photo.select.all');
        Route::patch('/photos', 'EmployeeController@updateEmployeePhoto')->name('employee.photo.update');
        Route::delete('/photos', 'EmployeeController@deleteEmployeePhoto')->name('employee.photo.delete');

        Route::post('/favourites', 'EmployeeController@createEmployeeFavourite')->name('employee.favourite.create');
        Route::get('/favourites', 'EmployeeController@selectEmployeeFavourite')->name('employee.favourite.select');
        Route::patch('/favourites', 'EmployeeController@updateEmployeeFavourite')->name('employee.favourite.update');
        Route::delete('/favourites', 'EmployeeController@deleteEmployeeFavourite')->name('employee.favourite.delete');

        Route::post('/profilePhotos', 'EmployeeController@createEmployeeProfilePhoto')->name('employee.profilePhoto.create');
        Route::get('/profilePhotos', 'EmployeeController@selectEmployeeProfilePhoto')->name('employee.profilePhoto.select');
        Route::patch('/profilePhotos', 'EmployeeController@updateEmployeeProfilePhoto')->name('employee.profilePhoto.update');
        Route::delete('/profilePhotos', 'EmployeeController@deleteEmployeeProfilePhoto')->name('employee.profilePhoto.delete');

        Route::get('/clients/{client_id}', 'ClientController@selectClient')->name('employee.client.get');

        Route::post('/stories', 'EmployeeController@createStory')->name('employee.story.create');
        Route::get('/stories', 'EmployeeController@selectStory')->name('employee.story.select');
        Route::patch('/stories', 'EmployeeController@updateStory')->name('employee.story.update');
        Route::delete('/stories', 'EmployeeController@deleteStory')->name('employee.story.delete');

        Route::post('/interests', 'EmployeeController@createEmployeeInterest')->name('employee.interest.create');
        Route::get('/interests', 'EmployeeController@selectEmployeeInterest')->name('employee.interest.select');
        Route::patch('/interests', 'EmployeeController@updateEmployeeInterest')->name('employee.interest.update');
        Route::delete('/interests', 'EmployeeController@deleteEmployeeInterest')->name('employee.interest.delete');

        Route::post('/personalities', 'EmployeeController@createEmployeePersonality')->name('employee.personality.create');
        Route::get('/personalities', 'EmployeeController@selectEmployeePersonality')->name('employee.personality.select');
        Route::patch('/personalities', 'EmployeeController@updateEmployeePersonality')->name('employee.personality.update');
        Route::delete('/personalities', 'EmployeeController@deleteEmployeePersonality')->name('employee.personality.delete');
    });
});

Route::prefix('client')->group(function () {

    Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('login', 'Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('/register', 'Auth\ClientRegisterController@showRegisterForm')->name('client.register');
    Route::post('/register', 'Auth\ClientRegisterController@register')->name('client.register.submit');
    Route::post('/password/forgot', 'Auth\PasswordRecovery@sendMailForRecoveryClient')->name('client.pass.rec');
    
    Route::middleware(['auth:client'])->group(function () {

        Route::get('/', 'ClientController@index')->name('client.dashboard');

        Route::get('/object', 'Auth\ClientLoginController@getClientByToken')->name('client.object');
        Route::post('/update', 'Auth\ClientRegisterController@clientUpdateProfile')->name('client.update');
        Route::post('/search/employee', 'ClientController@searchEmployee')->name('client.search.employee');

        Route::get('/interests/all', 'ClientController@getAllInterestsFromDb')->name('client.interests.all');

        Route::get('/employees/sixteen', 'ClientController@getSixteenEmployees')->name('client.employee.get.sixteen');

        Route::post('/messages', 'ClientController@createMessage')->name('client.message.create');
        Route::get('/messages', 'ClientController@selectMessage')->name('client.message.select');
        Route::patch('/messages', 'ClientController@updateMessage')->name('client.message.update');
        Route::delete('/messages', 'ClientController@deleteMessage')->name('client.message.delete');

        Route::post('/photos', 'ClientController@createClientPhoto')->name('client.photo.create');
        Route::post('/photos', 'ClientController@selectClientPhoto')->name('client.photo.select');
        Route::post('/photos/all', 'ClientController@selectClientPhotoAll')->name('client.photo.select.all');
        Route::patch('/photos', 'ClientController@updateClientPhoto')->name('client.photo.update');
        Route::post('/delete/photos', 'ClientController@deleteClientPhoto')->name('client.photo.delete');

        Route::post('/favourites', 'ClientController@createClientFavourite')->name('client.favourite.create');
        Route::get('/favourites', 'ClientController@selectClientFavourite')->name('client.favourite.select');
        Route::patch('/favourites', 'ClientController@updateClientFavourite')->name('client.favourite.update');
        Route::delete('/favourites', 'ClientController@deleteClientFavourite')->name('client.favourite.delete');

        Route::post('/profilePhotos', 'ClientController@createClientProfilePhoto')->name('client.profilePhoto.create');
        Route::get('/profilePhotos', 'ClientController@selectClientProfilePhoto')->name('client.profilePhoto.select');
        Route::patch('/profilePhotos', 'ClientController@updateClientProfilePhoto')->name('client.profilePhoto.update');
        Route::delete('/profilePhotos', 'ClientController@deleteClientProfilePhoto')->name('client.profilePhoto.delete');

        Route::post('/get', 'ClientController@selectClient')->name('client.create');
        Route::post('/create', 'ClientController@createClient')->name('client.select');
        //Route::post('/update', 'ClientController@updateClient')->name('client.update');
        Route::delete('/delete', 'ClientController@deleteClient')->name('client.delete');

        Route::post('/scheduleds', 'ClientController@createScheduled')->name('client.scheduled.create');
        Route::get('/scheduleds', 'ClientController@selectScheduled')->name('client.scheduled.select');
        Route::patch('/scheduleds', 'ClientController@updateScheduled')->name('client.scheduled.update');
        Route::delete('/scheduleds', 'ClientController@deleteScheduled')->name('client.scheduled.delete');

        Route::get('/credit/{client_id}', 'ClientController@checkCreditAmount')->name('client.credit.get');
        Route::post('/credit', 'ClientController@removeCredit')->name('client.credit.remove');

        Route::post('/employeePhoto', 'ClientController@selectEmployeePhoto')->name('client.employeePhoto.get');

        Route::get('/profileCompleted/{client_id}', 'ClientController@getProfilePercentage')->name('client.profileCompleted.get');

        Route::get('/employees/{employee_id}', 'ClientController@selectEmployee')->name('client.employee.get');

        Route::post('/stories', 'ClientController@watchStory')->name('client.story.watch');

        Route::post('/clientMatches', 'ClientController@createClientMatch')->name('client.match.create');
        Route::get('/clientMatches', 'ClientController@selectClientMatch')->name('client.match.select');
        Route::patch('/clientMatches', 'ClientController@updateClientMatch')->name('client.match.update');
        Route::delete('/clientMatches', 'ClientController@deleteClientMatch')->name('client.match.delete');

        Route::post('/employeeByInterests', 'ClientController@getEmployeeByInterests')->name('client.employeeByInterest.get');

        Route::post('/employeeByClientMatches', 'ClientController@getEmployeeByClientMatch')->name('client.employeeByClientMatch.get');

        Route::post('/employeeByMultiFilters', 'ClientController@getEmployeeByMultipleFilters')->name('client.employeeByMultipleFilter.get');

        Route::post('/personalities', 'ClientController@createClientPersonality')->name('client.personality.create');
        Route::get('/personalities', 'ClientController@selectClientPersonality')->name('client.personality.select');
        Route::patch('/personalities', 'ClientController@updateClientPersonality')->name('client.personality.update');
        Route::delete('/personalities', 'ClientController@deleteClientPersonality')->name('client.personality.delete');

        Route::get('/hairs/all', 'ClientController@getHairs')->name('client.hairs.all');
        Route::post('/settings/update', 'ClientController@updateClientSettings')->name('client.settings.update');
        Route::get('/settings/get', 'ClientController@getClientSettings')->name('client.settings.get');

        Route::get('/gift/get', 'GiftController@getAllGifts');
    });
});
