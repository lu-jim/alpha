<?php

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
    return view('welcome');
});


Route::get('test', function (){
    return view('test');
});

Route::get('1', function (){
    $name = request('name');
    return view('test', [
        'name' => $name
    ]);
});

// Using Wildcards to redirect
// Route::get('posts/{post}', function ($post){
//     $posts = [
//         'my-first-post' => 'Hello, this is my post. Starting',
//         'my-second-post' => 'Hello, this is my post. The sequel'
//     ];

//     if (! array_key_exists($post, $posts)) { 
//         abort(404, 'Sorry, that post was not found');
//     }

//     return view('post', [
//         'post' => $posts[$post]
//     ]);
// });

Route::get('posts/{post}', 'PostsController@show'); 

Route::get('contact', function (){
    return view('contact');
});

Route::get('about', function (){
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}/', 'ArticlesController@update');

// GET, POST, PUT, DELETE
// GET /articles
// GET /articles/:id
// POST /articles
// PUT /articles/:id
// DELETE /articles/:id