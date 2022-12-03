<?php


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.main');})->name('main');

    Route::get('/comment', function () {
        return view('front.comment');})->name('comment');
    



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes(['verify'=>true]);




Route::get('/', [App\Http\Controllers\front\BookController::class, 'index'])->name('books');



Route::prefix('admin')->middleware('CheckRole')->group(function(){
Route::get('/', [App\Http\Controllers\back\AdminController::class, 'index'])->name('admin.index')->middleware('verified');
Route::get('/users', [App\Http\Controllers\back\UserController::class, 'index'])->name('admin.users');
Route::get('/profile/{user}', [App\Http\Controllers\back\UserController::class, 'edit'])->name('admin.profile');
Route::post('/profile/{user}', [App\Http\Controllers\back\UserController::class, 'update'])->name('admin.profileupdate');
Route::get('/users/delete/{user}', [App\Http\Controllers\back\UserController::class, 'destroy'])->name('admin.delete');
Route::get('/users/status/{user}', [App\Http\Controllers\back\UserController::class, 'updatestatus'])->name('admin.status');

});

Route::prefix('admin/categories')->middleware('CheckRole')->group(function(){
    Route::get('/', [App\Http\Controllers\back\CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/create', [App\Http\Controllers\back\CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/store', [App\Http\Controllers\back\CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/edit/{category}', [App\Http\Controllers\back\CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/update/{category}', [App\Http\Controllers\back\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/destroy/{category}', [App\Http\Controllers\back\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    
    });

Route::prefix('admin/books')->middleware('CheckRole')->group(function(){
        Route::get('/', [App\Http\Controllers\back\BookController::class, 'index'])->name('admin.books');
        Route::get('/create', [App\Http\Controllers\back\BookController::class, 'create'])->name('admin.books.create');
        Route::post('/store', [App\Http\Controllers\back\BookController::class, 'store'])->name('admin.books.store');
        Route::get('/edit/{book}', [App\Http\Controllers\back\BookController::class, 'edit'])->name('admin.books.edit');
        Route::post('/update/{book}', [App\Http\Controllers\back\BookController::class, 'update'])->name('admin.books.update');
        Route::get('/destroy/{book}', [App\Http\Controllers\back\BookController::class, 'destroy'])->name('admin.books.destroy');
        Route::get('/status/{book}', [App\Http\Controllers\back\BookController::class, 'updatestatus'])->name('admin.books.status');
        });
        
        Route::prefix('admin/comments')->middleware('CheckRole')->group(function(){
            Route::get('/', [App\Http\Controllers\back\CommentController::class, 'index'])->name('admin.comments');
            Route::get('/edit/{comment}', [App\Http\Controllers\back\CommentController::class, 'edit'])->name('admin.comments.edit');
            Route::post('/update/{comment}', [App\Http\Controllers\back\CommentController::class, 'update'])->name('admin.comments.update');
            Route::get('/destroy/{comment}', [App\Http\Controllers\back\CommentController::class, 'destroy'])->name('admin.comments.destroy');
            Route::get('/status/{comment}', [App\Http\Controllers\back\CommentController::class, 'updatestatus'])->name('admin.comments.status');
            });
            
           
        Route::get('/', [App\Http\Controllers\front\BookController::class, 'index'])->name('books');
        Route::get('/book/{book}', [App\Http\Controllers\front\BookController::class, 'show'])->name('bookshow');
        Route::post('/search', [App\Http\Controllers\front\BookController::class, 'store'])->name('search');

        Route::post('~/store', [App\Http\Controllers\front\PurchaseController::class, 'store'])->name('purchase.store');


        Route::post('/store', [App\Http\Controllers\front\CommentController::class, 'store'])->name('comments.store');


Route::get('/profile/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('profile');
Route::post('/profile/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('profileupdate');






