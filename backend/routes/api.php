<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//api/users

Route::get('/users', function(){
    return User::all();
});

Route::get('/users/search', function(Request $request){
    $user = $request->input('user');
    return User::where('firstName', 'like', '%'.$user.'%')->get();
});


Route::post('/user', function(Request $request){

    $request->validate([
        'firstName' => 'required',
        'lastName'  => 'required',
        'email'     => 'required|unique:users',
        'password'  => 'required',
    ], [
        'firstName.required' => 'O campo nome é obrigatório',
        'lastName.required'  => 'O campo sobrenome é obrigatório',
        'email.unique'       => 'Esse valor já está cadastrado',
        'password.required'  => 'A senha é obrigatória'
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
