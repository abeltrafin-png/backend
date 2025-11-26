<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
   return view('welcome'); 
});

Route::get('/', function (){
   return view('profil'); 
});

Route::get('/', function (){
   return view('kontak'); 
});