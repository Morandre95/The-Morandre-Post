<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

                                    //PUBLIC ROUTES

//HOMEPAGE    
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//CAREERS
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');

//WORK WITH US
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');

//ABOUT US
Route::get('/about-us', [PublicController::class, 'aboutUs'])->name('about-us');

                                    //ARTICLE ROUTES

//INDEX ARTICLES
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

//SHOW ARTICLES
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

//BYCATEGORY ARTICLES
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

//BYUSER ARTICLES
Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');

                                    //ADMIN ROUTES
// Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');

                                    //TAG ROUTES
    Route::put('admin/edit/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');

                                    //CATEGORY ROUTES
    Route::put('admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
// });

                                    //REVISOR ROUTES
// Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');

// });

                                    //WRITER ROUTES
// Route::middleware('writer')->group(function(){
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/writer/dashbaoard', [WriterController::class, 'dashboard'])->name('writer.dashboard');

    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    // Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
// });

                                    //SEARCH ROUTES
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

                                    // FAQS ROUTES
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/faq/request', [FaqController::class, 'request'])->name('faq.request');
Route::post('/faq/request/store', [FaqController::class, 'storeRequest'])->name('faq.storeRequest');

                                    //CHANGE LANGUAGE ROUTES
Route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
