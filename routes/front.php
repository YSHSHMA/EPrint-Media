<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// ezoic route
// Route::get('/ads.txt', function () {
//     return Redirect::away('https://srv.adstxtmanager.com/19390/trendifybuzz.com', 301);
// });

// project routes
Route::get('maintenance-mode', [HomeController::class, 'maintenance_mode']);

Route::group(['middleware' => ['maintenance-mode','visitor']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/sitemap.xml', [HomeController::class, 'sitemap_xml'])->name('sitemap');
    Route::get('/rss.xml', [HomeController::class, 'rss_feed']);
    Route::get('/search', [PostController::class, 'search'])->name('search'); 

    Route::group(['prefix' => 'technology', 'as'=>'technology.'], function () {
        Route::get('/', [PostController::class, 'technology_index'])->name('index');
        Route::get('post/{slug}', [PostController::class, 'technology_post'])->name('post');
        Route::get('/load-more-posts', [PostController::class, 'technology_load_more'])->name('post.loadMore');
    });

    Route::group(['prefix' => 'finance', 'as'=>'finance.'], function () {
        Route::get('/', [PostController::class, 'finance_index'])->name('index');
        Route::get('/load-more-posts', [PostController::class, 'finance_load_more'])->name('post.loadMore');
        Route::get('post/{slug}', [PostController::class, 'finance_post'])->name('post');
    });

    Route::group(['prefix' => 'health', 'as'=>'health.'], function () {
        Route::get('/', [PostController::class, 'health_index'])->name('index');
        Route::get('/load-more-posts', [PostController::class, 'health_load_more'])->name('post.loadMore');
        Route::get('post/{slug}', [PostController::class, 'health_post'])->name('post');
    });

    Route::group(['prefix' => 'entertainment', 'as'=>'entertainment.'], function () {
        Route::get('/', [PostController::class, 'entertainment_index'])->name('index');
        Route::get('/load-more-posts', [PostController::class, 'entertainment_load_more'])->name('post.loadMore');
        Route::get('post/{slug}', [PostController::class, 'entertainment_post'])->name('post');
    });

    Route::get('contact-us', [HomeController::class, 'contact_us'])->name('contact-us');
    Route::post('contact-us-submit', [HomeController::class, 'contact_us_submit'])->name('contact-us-submit');
    Route::get('/about-us', [HomeController::class, 'about_us'])->name('about-us');
    Route::get('/disclaimer', [HomeController::class, 'disclaimer'])->name('disclaimer');
    Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
    Route::get('/terms-condition', [HomeController::class, 'terms_condition'])->name('terms-condition');
});
