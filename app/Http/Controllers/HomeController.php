<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.index');
    }
    public function beli()
    {
        return view('public.beli');
    }
    public function berita()
    {
        return view('public.berita');
    }
    public function blog()
    {
        return view('public.blog');
    }

}
