<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [EmployeeController::class, 'index'])->name('lista');
Route::get('crear', [EmployeeController::class, 'create'])->name('crear');
Route::post('crear', [EmployeeController::class, 'store'])->name('empleado.store');
Route::get('modificar/{id}', [EmployeeController::class, 'modificar'])->name('modificar');
Route::put('update/{id}', [EmployeeController::class, 'update'])->name('actualizar');
Route::delete('delete/{id}', [EmployeeController::class, 'delete'])->name('eliminar');
