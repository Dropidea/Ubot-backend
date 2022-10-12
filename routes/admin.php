<?php

use App\Http\Controllers\Dash_Admin\AdminController;
use App\Http\Controllers\Dash_Admin\Auth\AuthController;
use App\Http\Controllers\Dash_Admin\CompanyController;
use App\Http\Controllers\Dash_Admin\CountryController;
use App\Http\Controllers\Dash_Admin\FeatureController;
use App\Http\Controllers\Dash_Admin\PlanController;
use App\Http\Controllers\Dash_Admin\RoleController;
use App\Http\Controllers\Dash_Admin\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(function () {
    // make login
    Route::post('/login', [AuthController::class,'login']);

    /* -------------------------- middleware api admin -------------------------- */
    Route::middleware(['auth:api_admin'])->group(function () {
        /* ------------------------- Route of authenticated ------------------------- */
        Route::controller(AuthController::class)->group(function () {
            // get admin information
            Route::get('/me', 'me');
            // make logout
            Route::post('/logout', 'store');
            // make refresh token
            Route::post('/refresh', 'refresh');
            // change password
            Route::post('/change_password', 'change_password');
        });
        /* ----------------------------- Route of Admins ---------------------------- */
        Route::prefix('admins')->controller(AdminController::class)->group(function () {
        });
        /* ----------------------------- Route of Roles ----------------------------- */
        Route::prefix('roles')->controller(RoleController::class)->group(function () {
        });
        /* --------------------------- Route of Countries --------------------------- */
        Route::prefix('countries')->controller(CountryController::class)->group(function () {
        });
        /* --------------------------- Route of Countries --------------------------- */
        Route::prefix('states')->controller(StateController::class)->group(function () {
        });
        /* --------------------------- Route of Company --------------------------- */
        Route::prefix('companies')->controller(CompanyController::class)->group(function () {
        });
        /* --------------------------- Route of Plan --------------------------- */
        Route::prefix('plans')->controller(PlanController::class)->group(function () {
        });
        /* --------------------------- Route of Feature --------------------------- */
        Route::prefix('features')->controller(FeatureController::class)->group(function () {
        });

        /* --------------------------- Route of Method Payment --------------------------- */
        Route::prefix('method_payments')->controller(FeatureController::class)->group(function () {
        });
    });
});
