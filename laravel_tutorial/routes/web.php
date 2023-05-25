<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FallbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
    GET - Request a resource
    POST - Create a new resource
    PUT - Update a resource
    PATCH - Modify a resource
    DELETE - Delete a resource
    OPTIONS - Ask the server which verbs are allowed
*/

// Route::get('/blog', [PostsController::class, 'index']);

// POST
Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/blog', [PostsController::class, 'store'])->name('blog.store');

// GET
Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [PostsController::class, 'show'])->name('blog.show');

// Route::get('/blog/{id}', [PostsController::class, 'show'])->where('id', '[0-9]+');
// Route::get('/blog/{id}', [PostsController::class, 'show'])->whereNumber('id');
// Route::get('/blog/{name}', [PostsController::class, 'show'])->whereAlpha('id');

// Route::get('/blog/{id}', [PostsController::class, 'show'])
//      ->whereNumber('id')
//      ->whereAlpha('id');

// Route::get('/blog/{name}', [PostsController::class, 'show'])
//     ->where('name', '[A-Az-z]+');

// Route::get('/blog/{name}', [PostsController::class, 'show'])
//     ->where([
//         'id', '[0-9]+',
//         'name', '[A-Az-z]+']
//     );

// PUT OR PATCH
Route::get('/blog/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
Route::patch('/blog/{id}', [PostsController::class, 'update'])->name('blog.update');

// DELETE
Route::delete('/blog/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');

// Route::prefix('/')->group(function(){
//     Route::get('/', [PostsController::class, 'index'])->name('blog.index');
//     Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');
//     Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
//     Route::post('/', [PostsController::class, 'store'])->name('blog.store');
//     Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
//     Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');
//     Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');
// });

// Route::resource('blog', PostsController::class);

//Route for invoke method
Route::get('/', HomeController::class);

// Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
// Route::any('/blog,', [PostsController::class, 'index']);

// Return view
// Route::view('/blog', 'blog.index', ['name' => 'Code with Dary']);

// Fallback ROute
Route::fallback(FallbackController::class);
