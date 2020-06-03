<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//postController
Route::get('post/{slug}', 'PostController@post')->name('post.details');
Route::get('category/{slug}/posts', 'PostController@postByCategory')->name('category.posts');
Route::get('tag/{slug}/posts', 'PostController@postByTag')->name('tag.posts');

//comment controller
Route::post('comment', 'CommentController@store')->name('comment.store');
Route::post('replay', 'CommentController@replayStore')->name('replay.store');

//searchController
Route::get('search', 'SearchController@search')->name('search');

//AdminControllers
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    //dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    //profile
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::Put('profile/{id}/update', 'ProfileController@update')->name('profile.update');
    //approve pending
    Route::put('post/{id}/approve', 'PostController@approve')->name('post.approve');
    Route::get('post/pending', 'PostController@pending')->name('post.pending');
    //authors
    Route::get('users', 'MakeadminController@index')->name('users');
    Route::put('author/{username}/promotion', 'MakeadminController@promotion')->name('author.promotion');
    Route::delete('author/{username}/destroy', 'MakeadminController@destroy')->name('author.destroy');
    //admins
    Route::put('adm/{username}/demotion', 'MakeadminController@demotion')->name('adm.demotion');
    Route::delete('adm/{username}/admDestroy', 'MakeadminController@admDestroy')->name('adm.admDestroy');
    //resource route
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::resource('basic', 'BasicController');
});

//AuthorControllers
Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']], function () {
    //dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    //profile
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::Put('profile/{id}/update', 'ProfileController@update')->name('profile.update');
    //status
    Route::put('post/{id}/status', 'PostController@statusActive')->name('post.active');
    //resource
    Route::resource('post', 'PostController');
});
//facebook login route
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');