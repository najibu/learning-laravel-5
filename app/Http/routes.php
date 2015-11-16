<?php

event(new App\Events\SomeEvent);

Route::get('/', function()
{
	return view('welcome');
});

Route::get('admin', [ 'middleware' => 'admin:Gary', function()
{
	return 'Hello Gary';
}]);

Route::get('posts', function()
{
	return view('posts')->with('posts', App\Post::all());
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
