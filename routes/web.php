<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{
    UserController,OrderController,
    CandidateController,CompanyController,
    JobCategoryController,JobRoleController,
    JobPlanController,JobController,TagController,
    BenefitController,
};

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
    return to_route('login');
});

Auth::routes(['verify'=>true]);

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('home'); 
        Route::get('/icons',function() { return view('admin.manage_jobs.job_category.icons'); })->name('icons');

        Route::resource('orders', OrderController::class);
        Route::resource('users', UserController::class)->except('show');
        Route::resource('candidate', CandidateController::class)->except('destroy');
        Route::resource('company', CompanyController::class);
        Route::resource('jobCategory', JobCategoryController::class)->except('show');
        Route::resource('jobRole', JobRoleController::class)->except('show');
        Route::resource('jobPlan', JobPlanController::class);
        Route::resource('jobs', JobController::class);
        
        // Attributes Section (ADMIN)
        Route::resource('tags', TagController::class)->except('show');
        Route::resource('benefits', BenefitController::class)->except('show');
    });
    
});

