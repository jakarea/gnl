<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\CustomerControlller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarketPlaceController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\API\ForgotPasswordController;

use App\Http\Controllers\ProjectsController;

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

Route::group(['middleware' => ['guest']], function () {
    // Registration
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // forgot password handle routes for mobile app user
    Route::get('api/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::get('api/reset-update', [ForgotPasswordController::class, 'showStatusPage'])->name('password.status');
    Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});

// initial redirection route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/home', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard',  [DashboardController::class, 'index']);
});

Route::group(['middleware' => ['auth']], function () {

    Route::prefix('customers')->name('customers.')->group(function () {
        Route::get('/', [CustomerControlller::class, 'index'])->name('index');
        Route::post('/store', [CustomerControlller::class, 'store'])->name('store');
        Route::get('/{id}', [CustomerControlller::class, 'show'])->name('show');
        Route::post('/edit', [CustomerControlller::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CustomerControlller::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [CustomerControlller::class, 'destroy'])->name('destroy');
        Route::post('/details/modal', [CustomerControlller::class, 'showCustomerWithModal'])->name('details.modal');
    });

    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/search-customers', [ProjectsController::class, 'search'])->name('search.customers');

        Route::get('/', [ProjectsController::class, 'index'])->name('index');
        Route::get('/{id}', [ProjectsController::class, 'show'])->name('single');
        Route::post('/store', [ProjectsController::class, 'store'])->name('store');
        Route::get('/destroy', [ProjectsController::class, 'destroy'])->name('destroy');
    });

    // logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// all cache clear route
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    Artisan::call('storage:link');
    return redirect('/');
});
