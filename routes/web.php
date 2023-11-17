<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Members\MembersController;

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
    return view('auth.login');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::get('member/dashboard', function () {
    return view('member.dashboard');
})->middleware(['auth', 'role:member'])->name('member.dashboard');


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(AdminController::class)->group(function (){
        Route::get('logout', 'logout')->name('admin.logout');
        Route::get('profile', 'show')->name('admin.show');
        Route::post('profile/{user}', 'update')->name('admin.profile.update');
        Route::get('profile/setting', 'settings')->name('admin.setting');
        Route::post('profile/setting/update', 'update_settings')->name('admin.setting.update');
    });

    Route::controller(\App\Http\Controllers\Admin\MembersManagementController::class)->group(function (){
        Route::get('member/create', 'create')->name('admin.member.create');
        Route::post('member/create','store')->name('admin.member.store');
        Route::get('all-members', 'index')->name('admin.member.all');
        Route::get('member-details/{member:username}', 'show')->name('admin.member.view');
        Route::get('member-edit/{member:username}', 'edit')->name('admin.member.edit');
        Route::post('member-update/{member:username}', 'update')->name('admin.member.update');
        Route::delete('member/delete/{member}', 'destroy')->name('admin.member.delete');
    });

    Route::controller(\App\Http\Controllers\Admin\TaskController::class)->group(function (){
        Route::get('assign/task', 'create')->name('admin.task.create');
        Route::get('user/task/{user}','showFormForUser')->name('admin.user.task');
        Route::post('assign/task','store')->name('admin.task.store');

        Route::get('active/tasks', 'index')->name('admin.active.task');
        Route::get('all/tasks', 'allTasks')->name('admin.all.task');
        Route::get('tasks/{$userId}', 'getUserActiveTask')->name('admin.user.task');

    });


});

Route::prefix('member')->controller(MembersController::class)->middleware(['auth', 'role:member'])->group(function(){
    Route::get('logout', 'logout')->name('member.logout');
});











Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
