<?php
// require('Route.php');

Route::GET('lol','controllers/lolhard.php');
Route::GET('nolol','initController@index');
Route::beginRouting();