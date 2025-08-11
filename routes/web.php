<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    // Redirect to dashboard if authenticated, else show login or landing page
    if (auth()->check()) {
        return view('dashboard');
    }
    return view('index');
});

Auth::routes();


// Define a group of routes with 'auth' middleware applied
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    // Redirect /dashboard to dashboard view
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // All Users page for superadmin
    Route::get('/users', [UserController::class, 'show'])->name('users.show');

    // Add new user form
    Route::get('/users/add', [UserController::class, 'create'])->name('users.create');
    // Store new user
    Route::post('/store_user_superadmin', [UserController::class, 'store'])->name('users.store');

    // Edit user form
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Update user
    Route::post('/user_edit/{id}', [UserController::class, 'update'])->name('users.update');

    // Delete user
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Role CRUD routes
    Route::get('/user-roles', [\App\Http\Controllers\RoleManagementController::class, 'index'])->name('roles.show');
    Route::get('/user-roles/add', [\App\Http\Controllers\RoleManagementController::class, 'create'])->name('roles.create');
    Route::post('/user-roles/store', [\App\Http\Controllers\RoleManagementController::class, 'store'])->name('roles.store');
    Route::get('/user-roles/{id}/edit', [\App\Http\Controllers\RoleManagementController::class, 'edit'])->name('roles.edit');
    Route::post('/user-roles/{id}/update', [\App\Http\Controllers\RoleManagementController::class, 'update'])->name('roles.update');
    Route::delete('/user-roles/{id}', [\App\Http\Controllers\RoleManagementController::class, 'destroy'])->name('roles.destroy');

    // Permissions menu routes
    Route::get('/role-management', [\App\Http\Controllers\RoleManagementController::class, 'index'])->name('role.management');
    // Permission CRUD routes
    Route::get('/permission-settings', [\App\Http\Controllers\PermissionSettingsController::class, 'index'])->name('permission.settings');
    Route::get('/permission-settings/add', [\App\Http\Controllers\PermissionSettingsController::class, 'create'])->name('permissions.create');
    Route::post('/permission-settings/store', [\App\Http\Controllers\PermissionSettingsController::class, 'store'])->name('permissions.store');
    Route::get('/permission-settings/{id}/edit', [\App\Http\Controllers\PermissionSettingsController::class, 'edit'])->name('permissions.edit');
    Route::post('/permission-settings/{id}/update', [\App\Http\Controllers\PermissionSettingsController::class, 'update'])->name('permissions.update');
    Route::delete('/permission-settings/{id}', [\App\Http\Controllers\PermissionSettingsController::class, 'destroy'])->name('permissions.destroy');
    Route::post('/permission-settings/assign', [\App\Http\Controllers\PermissionSettingsController::class, 'assign'])->name('permissions.assign');
    Route::get('/access-control', [\App\Http\Controllers\AccessControlController::class, 'index'])->name('access.control');

    // Define a GET route with dynamic placeholders for route parameters
    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});
