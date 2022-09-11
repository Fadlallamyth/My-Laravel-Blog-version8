<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


/* posts */
Route::resource('posts', PostController::class)->only([
    'index','create','store','update','edit','destroy'
]);
Route::post('/deleteposts', [PostController::class, 'deleteposts']);
Route::post('/post/update/{id}', [PostController::class, 'postupdate'])->name('post.update');
Route::get('/posts/category/{link}', [PostController::class, 'category'])->name('posts.category');
Route::get('/drafts-posts', [PostController::class, 'draftposts'])->name('drafts-posts');
Route::get('/published-posts', [PostController::class, 'publishedposts'])->name('published-posts');
Route::get('/search', [PostController::class, 'search'])->name('search');

/* categories */
Route::resource('categories', CategoryController::class)->only([
    'index','create','store','update','edit','destroy'
]);
Route::post('/deletecategories', [CategoryController::class, 'deletecategories']);
Route::get('/category-search', [CategoryController::class, 'category_search'])->name('category-search');

/* pages */
Route::resource('pages', PageController::class)->only([
    'index','create','store','update','edit','destroy'
]);
Route::post('/deletepages', [PageController::class, 'deletepages']);
Route::post('/page/update/{id}', [PageController::class, 'pageupdate'])->name('page.update');
Route::get('/pages/category/{link}', [PageController::class, 'category'])->name('pages.category');
Route::get('/drafts-pages', [PageController::class, 'draftpages'])->name('drafts-pages');
Route::get('/published-pages', [PageController::class, 'publishedpages'])->name('published-pages');
Route::get('/pages-search', [PageController::class, 'pagessearch'])->name('pages-search');

/* settings */
/* Route::fallback(function(){ abort(404); }); */
Route::get('settings',[SettingController::class,'index'])->name('settings.index');
Route::post('/storesettings', [SettingController::class, 'storesettings'])->name('settingsss.storesettings');
Route::post('/settings/update/', [SettingController::class, 'settings_update'])->name('settings.update');

/* labels */
Route::resource('labels', LabelController::class)->only([
    'index','create','store','update','edit','destroy'
]);
Route::post('/labels/updatelabel1', [LabelController::class, 'labelsupdatelabel1'])->name('labels.updatelabel1');

/* front blog */
Route::get('/', [FrontController::class, 'index']); 
Route::get('/{url}', function ($url) {return Redirect::to('/');})->where('url', '(index)');
Route::get('/{slug}', [FrontController::class, 'blog_post'])->name('slug');
Route::get('/search/blog', [FrontController::class, 'search_blog'])->name('search.blog');
Route::get('/blog/category/{link}', [FrontController::class, 'blogcategory'])->name('blog.category');

/* comments */
Route::resource('comments', CommentController::class)->only([
    'index','create','store','update','edit','destroy'
]);

Route::fallback(function(){ abort(404); });