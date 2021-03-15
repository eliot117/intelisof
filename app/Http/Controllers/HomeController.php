<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function team()
    {
        return view('team');
    }

    public function testimonial()
    {
        return view('testimonial');
    }

    public function services()
    {
        return view('services');
    }

    public function portafolio()
    {
        return view('portafolio');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }
}

