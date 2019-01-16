<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();
Route::get('/home', 'HomeController@index');


Route::resource('borrowing','Borrowing_books\Controller\BorrowingBook');
Route::get('borrowing/edit/{id}','Borrowing_books\Helper\borrowing_helper@getData');



Route::resource('siswa','SiswaController');
Route::resource('students','Students\Controller\StudentsController');
Route::resource('books','Books\Controller\BooksController');


Route::get('books/delete/{id}', 'Books\Controller\BooksController@destroy')->name('books.delete');
Route::post('send', [
    'as' => 'send.sms',
    'uses' => 'Students\Service\students_services@sendSms']);

