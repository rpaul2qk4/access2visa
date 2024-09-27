<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();



	

Route::middleware(['auth'])->group(function (){   
	
	//profile
	Route::get('users/{id}/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
	Route::get('users/{id}/profile-edit', [App\Http\Controllers\UserController::class, 'profileEdit'])->name('users.profile-edit');
	Route::post('users/{id}/profile-update', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('users.profile-update');
	
	//Change Password	
	Route::get('/users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.change-password');
	Route::post('/users/{id}/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.update-password');
	
//User Roots
	//Route::group(['prefix' => 'user'], function () {
		Route::get('/user-home', [App\Http\Controllers\HomeController::class, 'userIndex'])->name('user-home');
		Route::post('specializations/comparison-report', [App\Http\Controllers\SpecializationController::class, 'comparisonReport'])->name('specializations.comparison-report');
		Route::post('specializations/comparison', [App\Http\Controllers\SpecializationController::class, 'comparison'])->name('specializations.comparison');

	//});
	
//Agent Roots
	Route::middleware(['agent'])->group(function (){   
		Route::get('/agent-home', [App\Http\Controllers\HomeController::class, 'agentIndex'])->name('agent-home');
	});
	
//Admin Roots
	//Route::group(['prefix' => 'admin'], function () {
	   
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		
		//Users
		Route::get('users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
		Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
		Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
		Route::get('users/{id}/show', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
		Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
		Route::post('users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
		Route::get('users/{id}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
		
		/* //profile
		Route::get('users/{id}/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
		Route::get('users/{id}/profile-edit', [App\Http\Controllers\UserController::class, 'profileEdit'])->name('users.profile-edit');
		Route::post('users/{id}/profile-update', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('users.profile-update');
		
		//Change Password	
		Route::get('/users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.change-password');
		Route::post('/users/{id}/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.update-password');
		 */
		//Users Import and export
		Route::post('users/import', [App\Http\Controllers\ExcelController::class,'importUsers'])->name('users.import');
		Route::get('users/export', [App\Http\Controllers\ExcelController::class,'exportUsers'])->name('users.export');

		//Roles
		Route::get('roles/index', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
		Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
		Route::post('roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
		Route::get('roles/{id}/show', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
		Route::get('roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
		Route::post('roles/{id}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
		Route::get('roles/{id}/delete', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.delete');
		
		//Countries
		Route::get('countries/index', [App\Http\Controllers\CountryController::class, 'index'])->name('countries.index');
		Route::get('countries/create', [App\Http\Controllers\CountryController::class, 'create'])->name('countries.create');
		Route::post('countries/store', [App\Http\Controllers\CountryController::class, 'store'])->name('countries.store');
		Route::get('countries/{id}/show', [App\Http\Controllers\CountryController::class, 'show'])->name('countries.show');
		Route::get('countries/{id}/edit', [App\Http\Controllers\CountryController::class, 'edit'])->name('countries.edit');
		Route::post('countries/{id}/update', [App\Http\Controllers\CountryController::class, 'update'])->name('countries.update');
		Route::get('countries/{id}/delete', [App\Http\Controllers\CountryController::class, 'destroy'])->name('countries.delete');

		//VisaTypes
		Route::get('visa-types/index', [App\Http\Controllers\VisaTypeController::class, 'index'])->name('visa-types.index');
		Route::get('visa-types/create', [App\Http\Controllers\VisaTypeController::class, 'create'])->name('visa-types.create');
		Route::post('visa-types/store', [App\Http\Controllers\VisaTypeController::class, 'store'])->name('visa-types.store');
		Route::get('visa-types/{id}/show', [App\Http\Controllers\VisaTypeController::class, 'show'])->name('visa-types.show');
		Route::get('visa-types/{id}/edit', [App\Http\Controllers\VisaTypeController::class, 'edit'])->name('visa-types.edit');
		Route::post('visa-types/{id}/update', [App\Http\Controllers\VisaTypeController::class, 'update'])->name('visa-types.update');
		Route::get('visa-types/{id}/delete', [App\Http\Controllers\VisaTypeController::class, 'destroy'])->name('visa-types.delete');

		//DumpFiles
		Route::get('visa-infos/{id}/index', [App\Http\Controllers\DumpFileController::class, 'index'])->name('visa-infos.index');
		Route::get('visa-infos/{id}/create', [App\Http\Controllers\DumpFileController::class, 'create'])->name('visa-infos.create');
		Route::post('visa-infos/store', [App\Http\Controllers\DumpFileController::class, 'store'])->name('visa-infos.store');
		Route::get('visa-infos/{id}/show', [App\Http\Controllers\DumpFileController::class, 'show'])->name('visa-infos.show');
		Route::get('visa-infos/{id}/edit', [App\Http\Controllers\DumpFileController::class, 'edit'])->name('visa-infos.edit');
		Route::post('visa-infos/{id}/update', [App\Http\Controllers\DumpFileController::class, 'update'])->name('visa-infos.update');
		Route::get('visa-infos/{id}/delete', [App\Http\Controllers\DumpFileController::class, 'destroy'])->name('visa-infos.delete');

		//Advertisements		
		Route::post('advertisements/{id}/update', [App\Http\Controllers\AdvertisementController::class, 'update'])->name('advertisements.update');
		Route::get('advertisements/{id}/delete', [App\Http\Controllers\AdvertisementController::class, 'destroy'])->name('advertisements.delete');
		
		
		//Excel Upload
		
		Route::get('import-export-excelfile', [App\Http\Controllers\ExcelController::class,'excelImportExport'])->name('import-export-excelfile');
		Route::post('excel/import', [App\Http\Controllers\ExcelController::class,'importData'])->name('excel.import');
		Route::get('excel/export', [App\Http\Controllers\ExcelController::class,'exportData'])->name('excel.export');
		
		//Permissions		
		Route::get('users/permission/{id}/{flag}', [App\Http\Controllers\UserController::class, 'permission'])->name('users.permission');
	
	//});
	
});

	Route::get('get-visa-types/{id}', [App\Http\Controllers\VisaTypeController::class, 'getVisaType'])->name('get-visa-types');  
	Route::get('get-visa-info/{id}', [App\Http\Controllers\VisaTypeController::class, 'getVisaInfo'])->name('get-visa-info');  


Route::get('/storagelink', function () {
   Artisan::call('storage:link');
});

	
Route::get('/viewfile/{folder}/{filename}', function ($folder, $filename) {	
		$filepath =  Storage::path("$folder/$filename");
		return response()->file($filepath);
	})->name('viewfile');

Route::get('/download/{folder}/{filename}', function ($folder, $filename) {
       $file =  Storage::get("$folder/$filename");
       return response($file, 200)->header('Content-Type', 'image/jpeg');
	})->name('download');
	
