<?php
Route::get('/', function () {
   return view('welcome');
});

Route::get('/insert', function () {
    return view('stud_create');
 });
 
// Route::get('/insert',['uses' => 'StudInsertController@insertform']);
// Route::post('/insert',['uses' => 'StudInsertController@insertform']);

// Route::post('create',array('uses' => 'StudInsertController@insert'));