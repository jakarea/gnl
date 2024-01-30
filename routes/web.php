<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;    
use App\Http\Controllers\ProjectsController; 
use App\Http\Controllers\CustomerControlller; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;

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
    Route::get('/analytics',  [DashboardController::class, 'analytics']);
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('search-customers', [ProjectsController::class, 'search'])->name('search.customers');
    Route::get('project/search', [TaskController::class, 'projectSearch'])->name('projectsearch');
    Route::get('get/project', [TaskController::class, 'getProjectById'])->name('getProjectById');


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
        Route::post('{id}/update', [ProjectsController::class, 'update'])->name('update');
        Route::post('{id}/destroy', [ProjectsController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('to-do-list')->name('task.')->group(function () {

        Route::post('/edit', [TaskController::class, 'edit']);
        Route::get('/', [TaskController::class, 'index']);
        Route::post('/store', [TaskController::class, 'store']);
        Route::get('/{id}', [TaskController::class, 'show']);
        Route::put('/{id}/update', [TaskController::class, 'update']);
        Route::delete('/{id}/delete', [TaskController::class, 'destroy']);
    });

    // all lead actions route
    Route::get('/all-leads', [LeadController::class, 'allLeads'])->name('lead.all-leads');
    Route::post('/leads-store', [LeadController::class, 'store'])->name('lead.store');
    Route::get('/lead-details/{id}', [LeadController::class, 'details'])->name('lead.details');
    Route::post('/leads-update', [LeadController::class, 'update'])->name('lead.update');
    Route::post('{id}/destroy', [LeadController::class, 'destroy'])->name('lead.destroy');

    // category leads route
    Route::get('/hosting-leads', [LeadController::class, 'hosting'])->name('lead.hosting-leads');
    Route::get('/marketing-leads', [LeadController::class, 'marketing'])->name('lead.marketing-leads');
    Route::get('/project-leads', [LeadController::class, 'project'])->name('lead.project-leads');
    Route::get('/website-leads', [LeadController::class, 'website'])->name('lead.website-leads');
    Route::get('/lost-leads', [LeadController::class, 'lost'])->name('lead.lost-leads');

    // earning route 
    Route::get('/total-earnings', [EarningController::class, 'index'])->name('earning.total-earnings');


    // expense route 
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.total-expense');

    // admin profile
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index']); 
        Route::get('/settings', [ProfileController::class, 'settings']); 
        Route::get('/settings/address', [ProfileController::class, 'address']); 
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
