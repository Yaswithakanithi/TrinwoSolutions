<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\EmployeeAuthController;


Route::get('/register/admin', [AuthController::class, 'showAdminRegisterForm'])->name('admin.register.form');
Route::post('/register/admin', [AuthController::class, 'registerAdmin'])->name('admin.register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::get('/settings', [GeneralSettingsController::class, 'index'])->name('admin.settings.index');

    
    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'adminIndex'])->name('admin.employees.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
        Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


        
        Route::get('/dashboard/{id}', [EmployeeController::class, 'showDashboard'])->name('employees.dashboard');
        

Route::get('/profile/{id}', [EmployeeController::class, 'adminViewProfile'])->name('mainemployee.profile');
Route::get('/clients/{id}', [EmployeeController::class, 'adminViewClients'])->name('mainemployee.clients.index');

    });

    
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    });
});


Route::prefix('employee')->group(function () {
    
    Route::get('/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
    Route::post('/login', [EmployeeAuthController::class, 'login'])->name('employee.login.post');
    Route::post('/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');

    
    Route::middleware(['auth:employee'])->group(function () {
        Route::get('/dashboard', [EmployeeAuthController::class, 'index'])->name('mainemployee.dashboard');
        Route::get('/profile', [EmployeeController::class, 'profile'])->name('mainemployee.profile');

        
        Route::prefix('clients')->group(function () {
            Route::get('/', [ClientController::class, 'employeeIndex'])->name('mainemployee.clients.index');
            Route::get('/create', [ClientController::class, 'employeeCreate'])->name('mainemployee.clients.create');
            Route::post('/store', [ClientController::class, 'employeeStore'])->name('mainemployee.clients.store');
            Route::get('/{client}/edit', [ClientController::class, 'employeeEdit'])->name('mainemployee.clients.edit');
            Route::put('/{client}', [ClientController::class, 'employeeUpdate'])->name('mainemployee.clients.update');
            Route::delete('/{client}', [ClientController::class, 'employeeDestroy'])->name('mainemployee.clients.destroy');
            Route::put('/{client}', [ClientController::class, 'employeeUpdate'])->name('mainemployee.clients.update');
            Route::delete('/{client}', [ClientController::class, 'employeeDestroy'])->name('mainemployee.clients.destroy');
        });
    });
});

