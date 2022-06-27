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
Route::get('/', 'App\Http\Controllers\BookController@show_books')->name('index_page');

//полки
Route::get('/shelves', 'App\Http\Controllers\BookController@create_shelf')->name('shelves_page');
Route::post('/shelves', 'App\Http\Controllers\BookController@create_shelf');
Route::get('/shelves/edit_shelf', 'App\Http\Controllers\BookController@edit_shelf')->name('edit_shelf');
Route::post('/shelves/edit_shelf', 'App\Http\Controllers\BookController@edit_shelf');
Route::get('/shelves/delete_shelf', 'App\Http\Controllers\BookController@delete_shelf')->name('delete_shelf');

//категории
Route::get('/categories', 'App\Http\Controllers\BookController@create_category')->name('categories_page');
Route::post('/categories', 'App\Http\Controllers\BookController@create_category');
Route::get('/categories/edit_category', 'App\Http\Controllers\BookController@edit_category')->name('edit_category');
Route::post('/categories/edit_category', 'App\Http\Controllers\BookController@edit_category');
Route::get('/categories/delete_category', 'App\Http\Controllers\BookController@delete_category')->name('delete_category');

//теги
Route::get('/tags', 'App\Http\Controllers\BookController@create_tag')->name('tags_page');
Route::post('/tags', 'App\Http\Controllers\BookController@create_tag');
Route::get('/tags/edit_tag', 'App\Http\Controllers\BookController@edit_tag')->name('edit_tag');
Route::post('/tags/edit_tag', 'App\Http\Controllers\BookController@edit_tag');
Route::get('/tags/delete_tag', 'App\Http\Controllers\BookController@delete_tag')->name('delete_tag');

//books
Route::get('/books', 'App\Http\Controllers\BookController@create_book')->name('books_page');
Route::post('/books', 'App\Http\Controllers\BookController@create_book');
Route::get('/books/edit_book', 'App\Http\Controllers\BookController@edit_book')->name('edit_book');
Route::post('/books/edit_book', 'App\Http\Controllers\BookController@edit_book');
Route::get('/books/delete_book', 'App\Http\Controllers\BookController@delete_book')->name('delete_book');

//readers
Route::get('/readers', 'App\Http\Controllers\BookController@create_reader')->name('readers_page');
Route::post('/readers', 'App\Http\Controllers\BookController@create_reader');
Route::get('/readers/edit_reader', 'App\Http\Controllers\BookController@edit_reader')->name('edit_reader');
Route::post('/readers/edit_reader', 'App\Http\Controllers\BookController@edit_reader');
Route::get('/readers/delete_reader', 'App\Http\Controllers\BookController@delete_reader')->name('delete_reader');