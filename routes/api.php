<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    $users = \App\Models\User::with('posts')->get();
    return \App\Http\Resources\UserResource::collection($users);
});
