<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\CustomerControlller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;

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

// initial redirection route
Route::group(['middleware' => ['auth']], function () {
    Route::redirect('/', '/dashboard');
    Route::redirect('/home', '/dashboard');
});

// custom auth routes
Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// all routes start
Route::group(['middleware' => ['auth']], function () {

    // common search api route
    Route::get('search-customers', [ProjectsController::class, 'search'])->name('search.customers');
    Route::get('project/search', [TaskController::class, 'projectSearch'])->name('projectsearch');
    Route::get('get/project', [TaskController::class, 'getProjectById'])->name('getProjectById');

    // dashboard route
    Route::get('/dashboard',  [DashboardController::class, 'index']);

    // analytics route
    Route::get('/analytics',  [AnalyticsController::class, 'index']);

    // customer route
    Route::prefix('customers')->name('customers.')->group(function () {
        Route::get('/', [CustomerControlller::class, 'index'])->name('index');
        Route::post('/store', [CustomerControlller::class, 'store'])->name('store');
        Route::get('/{id}', [CustomerControlller::class, 'show'])->name('show');
        Route::post('/edit', [CustomerControlller::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CustomerControlller::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [CustomerControlller::class, 'destroy'])->name('destroy');
        Route::post('/details/modal', [CustomerControlller::class, 'showCustomerWithModal'])->name('details.modal');
    });

    // todo list route
    Route::prefix('to-do-list')->name('task.')->group(function () {
        Route::post('/edit', [TaskController::class, 'edit']);
        Route::get('/', [TaskController::class, 'index']);
        Route::post('/store', [TaskController::class, 'store']);
        Route::get('/{id}', [TaskController::class, 'show'])->name('show');
        Route::put('/{id}/update', [TaskController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [TaskController::class, 'destroy']);

        Route::post('/taskbydate', [TaskController::class, 'showTaskByDate'])->name('showtaskdate');
    });




    // project route
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [ProjectsController::class, 'index'])->name('index');
        Route::get('/{id}', [ProjectsController::class, 'show'])->name('single');
        Route::post('/store', [ProjectsController::class, 'store'])->name('store');
        Route::post('{id}/update', [ProjectsController::class, 'update'])->name('update');
        Route::post('{id}/destroy', [ProjectsController::class, 'destroy'])->name('destroy');
    });

    // total lead route
    Route::prefix('leads')->name('lead.')->group(function () {
        Route::get('/all', [LeadController::class, 'allLeads'])->name('all-leads');
        Route::post('/store', [LeadController::class, 'store'])->name('store');
        Route::get('{id}/details', [LeadController::class, 'details'])->name('details');
        Route::post('/update', [LeadController::class, 'update'])->name('update');
        Route::post('{id}/destroy', [LeadController::class, 'destroy'])->name('destroy');
    });

    // leads different types route
    Route::name('lead.')->group(function () {
        Route::get('/hosting-leads', [LeadController::class, 'hosting'])->name('hosting-leads');
        Route::get('/marketing-leads', [LeadController::class, 'marketing'])->name('marketing-leads');
        Route::get('/project-leads', [LeadController::class, 'project'])->name('project-leads');
        Route::get('/website-leads', [LeadController::class, 'website'])->name('website-leads');
        Route::get('/lost-leads', [LeadController::class, 'lost'])->name('lost-leads');
    });


    // all lead sortable

    Route::post('/leads/state/update', [LeadController::class, 'leadStateUpdate'])->name('lead.state.update');

    Route::post('/lead/reactive', [LeadController::class, 'leadReactive'])->name('lead.reactive');
    Route::post('/inprogress-leads/sortable', [LeadController::class, 'inprogressLeadsSortable'])->name('state.lead.sortable');





    // common earning route
    Route::name('earning.')->group(function () {
        Route::get('earning/details/{id?}', [EarningController::class, 'showEarningWithModal'])->name('details');
        Route::get('/total-earnings', [EarningController::class, 'index'])->name('total-earnings');
        Route::post('/add-earnings', [EarningController::class, 'store'])->name('add-earnings');
        Route::post('{id}/destroy-earnings', [EarningController::class, 'destroy'])->name('destroy-earnings');
    });

    // earning with different lead type
    Route::name('earning.')->group(function () {
        Route::get('/hosting-earnings', [EarningController::class, 'hostingEarning'])->name('hosting-earnings');
        Route::get('/marketing-earnings', [EarningController::class, 'marketingEarning'])->name('marketing-earnings');
        Route::get('/project-earnings', [EarningController::class, 'projectEarning'])->name('project-earnings');
        Route::get('/website-earnings', [EarningController::class, 'websiteEarning'])->name('website-earnings');
    });

    // expense route
    Route::prefix('expenses')->name('expense.')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->name('index');
        Route::post('/store', [ExpenseController::class, 'store'])->name('store');
        Route::get('/{id}', [ExpenseController::class, 'show'])->name('show');
        Route::put('/{id}', [ExpenseController::class, 'update'])->name('update');
        Route::delete('/{id}', [ExpenseController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/invoice-download', [ExpenseController::class, 'invoiceDownload'])->name('invoice.download');
    });

    // admin profile
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('index');
        Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
        Route::put('/settings/update', [ProfileController::class, 'settingsUpdate'])->name('settings.update');
        Route::get('/settings/address', [ProfileController::class, 'address'])->name('address');
        Route::put('/address/update', [ProfileController::class, 'addressUpdate'])->name('address.update');
    });

    // Notification
    Route::prefix('notifications')->name('notification.')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::put('/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('markAsRead');
        Route::put('/mark-as-unread/{id}', [NotificationController::class, 'markAsUnRead'])->name('markAsUnread');
    });

    // Notification
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::post('/store', [CommentController::class, 'store'])->name('store');
        Route::post('/like', [CommentController::class, 'like'])->name('like');
        Route::post('/dislike', [CommentController::class, 'dislike'])->name('dislike');
        Route::post('/reply/{comment}', [CommentController::class, 'reply'])->name('reply');

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
