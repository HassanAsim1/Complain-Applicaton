<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\complaincontroller;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->group(function () {
    
    Route::get('admin/complain', [complaincontroller::class, 'view_complain']);
    Route::get('admin/add-complain', [complaincontroller::class, 'addcomplain']);
    Route::post('admin/add-complain', [complaincontroller::class, 'complain_store']);
    Route::get('admin/view-complain', [complaincontroller::class, 'view_complain'])->name('admin.complain.addcomplain');
    Route::get('delete/{id} ', [complaincontroller::class, 'deletecomplain']);
    Route::post('/submit-complaint', [complaincontroller::class, 'complain_store'])->name('complaint.store');
    Route::get('view-complain-details', [complaincontroller::class, 'view_detail_complain'])->name('detail.complaint.store');
    Route::get('admin/add-user', [admincontroller::class, 'add_user']);
    Route::get('admin/view-user', [admincontroller::class, 'view_user']);
    Route::get('delete_user/{id}', [admincontroller::class, 'delete_user']);
    Route::get('edit-complaint/{id}', [complaincontroller::class, 'edit_complaint']);
    Route::post('admin/edit-complain', [complaincontroller::class, 'edit_complaint_store']);
    Route::post('admin/add-user', [UserController::class, 'developerRegister'])->name('developerRegister');

});


Route::middleware(['client'])->group(function () {
    
    Route::get('client/complaints', [complaincontroller::class, 'view_complain'])->name('client.complaints');;
    Route::get('client/add-client-complain', [complaincontroller::class, 'clientAddComplain']);
    Route::post('client/add-complain', [complaincontroller::class, 'complain_store']);
    

});


Route::middleware(['developer'])->group(function () {
    Route::get('developer/complaints', [complaincontroller::class, 'view_complain'])->name('developer.complaints');
    Route::get('developer/complete/{id}',[complaincontroller::class, 'complete_complain']);

});


Route::get('admin/edit-user', [admincontroller::class, 'editUser'])->name('editUser');
Route::post('admin/edit-user', [admincontroller::class, 'editUserData'])->name('editUserData');

