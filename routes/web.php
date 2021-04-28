<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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



Route::middleware(['auth'])->group(function () {
    Route::resources([
        'companies' => 'CompanyController',
        'employees' => 'EmployeeController',
    ]);
});

Route::get('/tokens/create', function () {
    $token = Auth::user()->createToken(Str::random(10));
    return ['token' => $token->plainTextToken];
})->name('getToken');

Auth::routes(['register' => false]);

Route::get('/home', 'CompanyController@index')->name('home');

