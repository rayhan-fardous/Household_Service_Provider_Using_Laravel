<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\managerController;
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

//Login 
Route::get('/login',[adminController::class,'login'])->name('login');
Route::post('/login',[adminController::class,'loginSubmit'])->name('login.submit');
Route::get('/logout',[adminController::class,'logout'])->name('logout');



//Admin
Route::get('/admin/registration',[adminController::class,'registration'])->name('admin.registration');
Route::post('/admin/registration',[adminController::class,'registrationSubmit'])->name('admin.registration.submit');
Route::get('/admin/home',[adminController::class,'Home'])->name('admin.home');









//Manager
Route::get('/manager/registration',[managerController::class,'registration'])->name('manager.registration');
Route::post('/manager/registration',[managerController::class,'registrationSubmit'])->name('manager.registration.submit');
Route::get('/manager/home',[managerController::class,'Home'])->middleware('auth.manager')->name('manager.home');
Route::get('/manager/profile',[managerController::class,'Profile'])->middleware('auth.manager')->name('manager.profile');
Route::get('/manager/setting',[managerController::class,'Setting'])->middleware('auth.manager')->name('manager.setting');
Route::post('/manager/setting',[managerController::class,'SettingSubmit'])->middleware('auth.manager')->name('manager.setting.submit');
Route::get('/manager/update',[managerController::class,'update'])->middleware('auth.manager')->name('manager.update');
Route::post('/manager/update',[managerController::class,'updatesubmit'])->middleware('auth.manager')->name('manager.update.submit');
Route::get('/manager/leave',[managerController::class,'leave'])->middleware('auth.manager')->name('manager.leave');
Route::get('/manager/transfer',[managerController::class,'transfer'])->middleware('auth.manager')->name('manager.transfer');
Route::post('/manager/transfer',[managerController::class,'transferSubmit'])->middleware('auth.manager')->name('manager.transfer.submit');
Route::get('/manager/ServiceName/Add',[managerController::class,'servicename'])->middleware('auth.manager')->name('manager.addservicename');
Route::post('/manager/ServiceName/Add',[managerController::class,'servicenamesubmit'])->middleware('auth.manager')->name('manager.addservicename.submit');
Route::get('/manager/Service/Add',[managerController::class,'service'])->middleware('auth.manager')->name('manager.addservice');
Route::post('/manager/Service/Add',[managerController::class,'servicesubmit'])->middleware('auth.manager')->name('manager.addservice.submit');
Route::get('/manager/Order/Process',[managerController::class,'processOrder'])->middleware('auth.manager')->name('manager.order');
Route::post('/manager/Order/Process',[managerController::class,'processOrderSubmit'])->middleware('auth.manager')->name('manager.order.submit');
Route::get('/manager/Order/revenue',[managerController::class,'totalEarn'])->middleware('auth.manager')->name('manager.earn');

//stuff





//customer