<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

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

// Client
Route::get('/', [ClientController::class, 'getIndexView'])->middleware('login.check');
Route::get('/login', [ClientController::class, 'getLoginView']);
Route::get('/register', [ClientController::class, 'getRegisterView']);
Route::get('/logout', [ClientController::class, 'logout']);
Route::get('/order', [ClientController::class, 'order']);
Route::post('/add-cart', [CartController::class, 'addToCart']);
Route::post('/remove-cart', [CartController::class, 'removeToCart']);
Route::post('/place-order', [CartController::class, 'placeOrder']);

Route::get('/table-reservation', [ClientController::class, 'tableReservation']);



// Admin
Route::get('/admin', [AdminController::class, 'getAdminIndexView']);
Route::get('/admin/login', [AdminController::class, 'getAdminLoginView']);
Route::get('/admin/logout', [ClientController::class, 'adminLogout']);


Route::get('/admin/manage-admin', [AdminController::class, 'getManageAdminView']);
Route::get('/admin/add-admin', [AdminController::class, 'getAddAdminView']);
Route::get('/admin/update-admin', [AdminController::class, 'getUpdateAdminView']);
Route::get('/admin/delete-admin', [AdminController::class, 'getDeleteAdminView']);

Route::get('/admin/manage-category', [AdminController::class, 'getManageCategoryView']);
Route::get('/admin/add-category', [AdminController::class, 'getAddCategoryView']);
Route::get('/admin/update-category', [AdminController::class, 'getUpdateCategoryView']);
Route::get('/admin/delete-category', [AdminController::class, 'getDeleteCategoryView']);

Route::get('/admin/manage-food', [AdminController::class, 'getManageFoodView']);
Route::get('/admin/add-food', [AdminController::class, 'getAddFoodView']);
Route::get('/admin/update-food', [AdminController::class, 'getUpdateFoodView']);
Route::get('/admin/delete-food', [AdminController::class, 'getDeleteFoodView']);

Route::get('/admin/manage-order', [AdminController::class, 'getManageOrderView']);
Route::get('/admin/update-order', [AdminController::class, 'getUpdateOrderView']);
Route::get('/admin/food-details', [AdminController::class, 'getFoodDetailsView']);

Route::get('/admin/manage-reservation', [AdminController::class, 'getManageReservationView']);
Route::get('/admin/update-reservation', [AdminController::class, 'getUpdateReservationView']);