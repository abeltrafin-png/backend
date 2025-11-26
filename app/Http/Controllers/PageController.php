<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /* public function profil()
    {
        return"ini halaman profil";
    } */

    public function show($id)
    {
        return "ini halaman user dengan id : ".$id;
    }

    public function index(){
        return "ini halaman profil dengan ";
    }
}