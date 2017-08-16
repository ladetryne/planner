<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimelineExampleController extends Controller
{
    public function index()
    {
        return view('pages.timelineexample');
    }

    public function index2()
    {
        return view('pages.timelineexample2');
    }

    public function index3()
    {
        return view('pages.timelineexample3');
    }
}
