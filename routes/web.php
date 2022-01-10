<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;


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
Route::get('/', [IndexController::class, 'index']);
Route::get('/logout', [IndexController::class, 'logout']);
Route::get('/register', [IndexController::class, 'create']);

Route::get('/companies-create', [IndexController::class, 'companies_create']);
Route::post('/companies-create', [IndexController::class, 'companies_create_new']);
Route::get('/companies-edit-{id}', [IndexController::class, 'companies_edit']);
Route::post('/companies-update-{id}', [IndexController::class, 'companies_update']);


Route::get('/employees-create', [IndexController::class, 'employees_create']);
Route::get('/employees-edit-{id}', [IndexController::class, 'employees_edit']);
Route::post('/employees-update-{id}', [IndexController::class, 'employees_update']);

Route::resources([
    'accounts'  => AccountController::class,
    'companies' => CompanyController::class,
    'employees' => EmployeeController::class,
]);