<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficeController;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    //Account routes
    Route::middleware(['role:admin'])->group(function () {
        Route::post('reply',  [ReplyController::class, 'store'])->name('reply.store');
        Route::get('reply/{reply}/delete',  [ReplyController::class, 'destroy'])->name('reply.delete');

        Route::get('/accounts', [UserController::class, 'index'])->name('accounts');
        Route::get('/account/{user}/edit', [UserController::class, 'edit'])->name('account.edit');
        Route::put('/account/{user}/update', [UserController::class, 'update'])->name('account.update');
        Route::get('/account/{user}/update-status', [UserController::class, 'updateStatus'])->name('account.update.status');

        Route::resource('region', RegionController::class, ['names' => 'region']);
        Route::resource('zone', ZoneController::class, ['names' => 'zone']);
        Route::resource('woreda', WoredaController::class, ['names' => 'woreda']);

        Route::resource('office', OfficeController::class, ['names' => 'office']);
        Route::resource('staff', StaffController::class, ['names' => 'staff']);
        Route::resource('survey', SurveyController::class, ['names' => 'survey']);
        Route::resource('surveyPolicy', SurveyPolicyController::class, ['names' => 'surveyPolicy']);

        Route::resource('definedComplaint', DefinedComplaintController::class, ['names' => 'definedComplaint']);
        //role routes
        Route::resource('role', RoleController::class, ['name' => 'role']);

        //import routes
        Route::get('configuration',  [ConfigurationController::class, 'index']);
        Route::post('import-office',  [ConfigurationController::class, 'importOffice'])->name('import-office');
        Route::post('import-staff',  [ConfigurationController::class, 'importStaff'])->name('import-staff');

    });

    //report route
    Route::get('complaint', [ComplaintController::class, 'index'])->name('complaint');


    Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');

    //Page routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
