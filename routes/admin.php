<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;


Route::get('admin-login', [AuthController::class, 'login_view'])->name('auth');
Route::post('admin-login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'admin_auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('setting')->as('setting.')->controller(SettingController::class)->group(function () {
        Route::get('config', 'config')->name('config');
        Route::post('config/update', 'config_update')->name('config.update');
        
        Route::get('maintenance-mode/{checked}', 'maintenance_mode');

        Route::get('agreement', 'agreement')->name('agreement');
        Route::post('agreement/update', 'agreement_update')->name('agreement.update');
    });

    Route::prefix('category')->as('category.')->controller(AdminController::class)->group(function () {
        Route::get('list', 'category_list')->name('list');
        Route::post('store', 'category_store')->name('store');
        Route::post('update', 'category_update')->name('update');
        Route::post('status', 'category_status')->name('status');
    });
    
    Route::prefix('post')->as('post.')->controller(PostController::class)->group(function () {
        Route::get('add', 'post_add')->name('add');
        Route::post('store', 'post_store')->name('store');
        Route::get('list', 'post_list')->name('list');
        Route::get('edit', 'post_edit')->name('edit');
        Route::post('update', 'post_update')->name('update');
        Route::get('delete', 'post_delete')->name('delete');
        Route::post('check/limit', 'check_limit')->name('check.limit');
        Route::post('status', 'post_status')->name('status');
    });

    Route::get('/contact/list', [AdminController::class, 'contact_list'])->name('contact.list');
    Route::get('/visitor/list', [AdminController::class, 'visitor_list'])->name('visitor.list');
});
