<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\ToolIssueController;
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');    



    Route::middleware(['auth'])->group(function () {

    Route::get(
        '/mechanic/dashboard',
        [MechanicController::class, 'dashboard']
    )->name('mechanic.dashboard');


    Route::post(
        '/mechanic/tools/{tool}/issue',
        [ToolIssueController::class, 'issue']
    )->name('mechanic.tools.issue');

});

Route::post(
    '/mechanic/tools/{issue}/return',
    [ToolIssueController::class, 'returnTool']
)->name('mechanic.tools.return');

    Route::post('/register',
    [AuthController::class, 'register'])
    ->name('register.store');


    Route::post('/login',
    [AuthController::class, 'login'])
    ->name('login.store');


    Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get(
            '/dashboard',
            [AdminController::class, 'dashboard']
        )->name('dashboard');


        // Tools
        Route::get(
            '/tools',
            [ToolController::class, 'index']
        )->name('tools.index');


        Route::get(
            '/tools/create',
            [ToolController::class, 'create']
        )->name('tools.create');


        Route::post(
            '/tools',
            [ToolController::class, 'store']
        )->name('tools.store');


        Route::get(
            '/tools/{tool}/edit',
            [ToolController::class, 'edit']
        )->name('tools.edit');


        Route::put(
            '/tools/{tool}',
            [ToolController::class, 'update']
        )->name('tools.update');


        Route::delete(
            '/tools/{tool}',
            [ToolController::class, 'destroy']
        )->name('tools.destroy');
    });