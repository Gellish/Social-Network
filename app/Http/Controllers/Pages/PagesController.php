<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex() {
        return view('index');
    }
    public function getHome() {
        return view('home');
    }

    public function getAbout() {
        return view('about');
    }

    public function getBlog() {
        return view('blog');
    }

    public function getContact() {
        return view('contact');
    }

    public function getEvent() {
        return view('event');
    }

    public function getFaculty() {
        return view('Faculty');
    }
    public function getNews() {
        return view('News');
    }




}
