<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        return view('front.main');
    }

    public function success () {
        return view('front.msgs.booksuccess');
    }

    public function error () {
        return view('front.msgs.bookerror');
    }

    public function back_end () {
        header('Location: http://www.dementedhaunt.com/demo2/public/login');
    }

}
