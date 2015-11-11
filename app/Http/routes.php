<?php

Route::get('/', function()
{
	return view('welcome');
});

Route::post('search-results', function(){
	return sprintf('Search results for "%s"', Request::input('search'));
});

Route::get('other', function()
{
	return view('other');
});

Route::get('foo', 'FooController@foo');


Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::get('tags/{tags}', 'TagsController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
