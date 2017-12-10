<?php

use Illuminate\Http\Request;

Route::get('/users', function () {
    $users = App\User::all();
    return $users;
});
Route::get('users/{user}', function ($userId) {
    return response(App\User::find($userId), 200);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
