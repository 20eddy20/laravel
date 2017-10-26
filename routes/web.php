<?php



Route::get('/', 'FrontController@index');
Route::get('contacto', 'FrontController@contacto');
Route::get('reviews', 'FrontController@reviews');
Route::get('admin', 'FrontController@admin');
Route::resource('usuario','UsuarioController');
Route::resource('log','LogController');
Route::get('logout', 'LogController@logout');

//@todo rutas para generos
Route::resource('genero','GeneroController');
Route::get('generos', 'GeneroController@listing');


