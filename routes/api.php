<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HydraController;
use App\Http\Controllers\ApiTaskController;

use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\ApiExpenseController;
use App\Http\Controllers\ApiPaymentController;
use App\Http\Controllers\ApiProjectController;
use App\Http\Controllers\API\ApiLeadController;

use App\Http\Controllers\API\ProductController;


use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\ApiCustomerControlller;
use App\Http\Controllers\ApiServiceTypeController;

use App\Http\Controllers\API\ApiLeadTypeController;
use App\Http\Controllers\API\VerificationController;
use App\Http\Controllers\API\ForgotPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

//use the middleware 'hydra.log' with any request to get the detailed headers, request parameters and response logged in logs/laravel.log

Route::get('hydra', [HydraController::class, 'hydra']);
Route::get('hydra/version', [HydraController::class, 'version']);

Route::apiResource('users', UserController::class)->except(['create', 'store', 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);

Route::post('users', [UserController::class, 'store']);
Route::put('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::post('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::patch('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::put('users/update-password/{user}', [UserController::class, 'updatePassword'])->middleware(['auth:sanctum']);

Route::get('me', [UserController::class, 'me'])->middleware(['auth:sanctum']);
Route::post('login', [UserController::class, 'login']);

Route::apiResource('roles', RoleController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::apiResource('users.roles', UserRoleController::class)->except(['create', 'edit', 'show', 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('client')->name('api.client.')->group(function () {

        Route::get('category', [CategoryController::class, 'index']);

        Route::get('product', [ProductController::class, 'index']);
        Route::get('product/{product}', [ProductController::class, 'productDetails']);
        Route::get('/{company}/products', [ProductController::class, 'getProductsOfCompany']);

        Route::get('profile', [ClientController::class, 'profile']);
        Route::post('profile', [ClientController::class, 'profileUpdate']);
        Route::post('security/settings', [ClientController::class, 'securitySettings']);

    });
});


Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('company')->name('api.company.')->group(function () {

        Route::get('category', [CategoryController::class, 'index']);

        Route::get('product', [ProductController::class, 'index'])->name('product.list');
        Route::post('product', [ProductController::class, 'store']);
        Route::get('product/{product}/edit', [ProductController::class, 'editProduct']);
        Route::post('product/{product}', [ProductController::class, 'updateProduct']);
        Route::get('product/destroy/{id}', [ProductController::class, 'destroy']);

        Route::get('/{company}/products', [ProductController::class, 'getProductsOfCompany']);
        Route::get('product/{product}', [ProductController::class, 'productDetails']);

        Route::get('profile', [ClientController::class, 'profile']);
        Route::post('profile', [ClientController::class, 'profileUpdate']);
        Route::post('security/settings', [ClientController::class, 'securitySettings']);

    });
});

Route::post('/verify-email/{user}/{code}', [VerificationController::class, 'verify'])->name('verify.email');
Route::post('/resend-verification/{user}', [VerificationController::class, 'resend'])->name('verify.resend');
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('password.forgot');


// Sajib Prodhan
// Route::middleware(['auth:sanctum'])->group(function () {

    // Customers Controllers
    Route::prefix('customer')->name('api.customer.')->group(function () {


        Route::get('/', [ApiCustomerControlller::class, 'index']);

        Route::post('/store', [ApiCustomerControlller::class, 'store']);

        Route::get('/status', [ApiCustomerControlller::class, 'searchCustomerQuery']);

        Route::get('/{id}', [ApiCustomerControlller::class, 'show']);

        Route::put('/{id}/update', [ApiCustomerControlller::class, 'update']);

        Route::delete('/{id}/delete', [ApiCustomerControlller::class, 'destroy']);





    });

    // Projects Controllers
    Route::prefix('project')->name('api.project.')->group(function () {
        Route::get('/', [ApiProjectController::class, 'index']);
        Route::post('/store', [ApiProjectController::class, 'store']);
        Route::get('/{id}', [ApiProjectController::class, 'show']);
        Route::put('/{id}/update', [ApiProjectController::class, 'update']);
        Route::delete('/{id}/delete', [ApiProjectController::class, 'destroy']);
        Route::get('/customer/search', [ApiProjectController::class, 'customerSearch']);
    });

    // Task Controller
    Route::prefix('task')->name('api.task.')->group(function () {
        Route::get('/', [ApiTaskController::class, 'index']);
        Route::post('/store', [ApiTaskController::class, 'store']);
        Route::get('/{id}', [ApiTaskController::class, 'show']);
        Route::put('/{id}/update', [ApiTaskController::class, 'update']);
        Route::delete('/{id}/delete', [ApiTaskController::class, 'destroy']);
        Route::get('/project/search', [ApiTaskController::class, 'projectSearch']);
    });

    // Service Type Controllers
    Route::prefix('service-type')->name('api.project.')->group(function () {
        Route::get('/', [ApiServiceTypeController::class, 'index']);
        Route::post('/store', [ApiServiceTypeController::class, 'store']);
        Route::get('/{id}', [ApiServiceTypeController::class, 'show']);
        Route::put('/{id}', [ApiServiceTypeController::class, 'update']);
        Route::delete('/{id}', [ApiServiceTypeController::class, 'destroy']);
    });

    Route::prefix('lead-type')->name('api.lead_type.')->group(function () {
        Route::get('/', [ApiLeadTypeController::class, 'index']);
        Route::post('/store', [ApiLeadTypeController::class, 'store']);
        Route::get('/{id}', [ApiLeadTypeController::class, 'show']);
        Route::put('/{id}', [ApiLeadTypeController::class, 'update']);
        Route::delete('/{id}', [ApiLeadTypeController::class, 'destroy']);
    });


    Route::prefix('payment')->name('api.payment.')->group(function () {
        Route::get('/', [ApiPaymentController::class, 'index']);
        Route::post('/store', [ApiPaymentController::class, 'store']);
        Route::get('/{id}', [ApiPaymentController::class, 'show']);

    });

    Route::prefix('leads')->name('api.leads.')->group(function () {
        Route::get('/', [ApiLeadController::class, 'index']);
        Route::post('/store', [ApiLeadController::class, 'store']);
        Route::get('/{id}', [ApiLeadController::class, 'show']);
        Route::put('/{id}', [ApiLeadController::class, 'update']);
        Route::delete('/{id}', [ApiLeadController::class, 'destroy']);
    });


    Route::prefix('expense')->name('api.expense.')->group(function () {
        Route::get('/', [ApiExpenseController::class, 'index']);
        Route::post('/store', [ApiExpenseController::class, 'store']);
        Route::get('/{id}', [ApiExpenseController::class, 'show']);
        Route::put('/{id}', [ApiExpenseController::class, 'update']);
        Route::delete('/{id}', [ApiExpenseController::class, 'destroy']);
    });

// });
