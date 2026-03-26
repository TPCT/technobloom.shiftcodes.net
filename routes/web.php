<?php

use App\Models\Translation\Translation;
use Illuminate\Support\Facades\Route;

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


Route::prefix('{locale?}')
    ->middleware([
        \App\Http\Middleware\SetLocale::class,
        \App\Http\Middleware\StatusChecker::class,
        \App\Http\Middleware\ComingSoonMiddleware::class
    ])
    ->group(function(){
        Route::get('/coming-soon', function(){
            return view('coming-soon');
        })->name('site.coming-soon');

        Route::resource('news', \App\Http\Controllers\NewsController::class)->only([
            'show', 'index'
        ]);

        Route::controller(\App\Http\Controllers\SiteController::class)
            ->group(function(){
                Route::any('/', 'index')->name('site.index');
                Route::get('/about-us', 'aboutUs')->name('site.about-us');
                Route::get('/faqs', 'faqs')->name('site.faqs');
                Route::any('/contact-us', 'contactUs')->name('site.contact-us')
                    ->middleware('throttle:5,1');
            });

        Route::resource('projects', \App\Http\Controllers\ProjectsController::class)->only([
            'index', 'show'
        ]);

        Route::resource('services', \App\Http\Controllers\ServicesController::class)->only([
            'show'
        ]);

        Route::get('/{page}', [\App\Http\Controllers\SiteController::class, 'show'])->name('page.show');

        Route::fallback([\App\Http\Controllers\SiteController::class, 'show']);
    });

