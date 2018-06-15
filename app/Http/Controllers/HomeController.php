<?php

namespace App\Http\Controllers;

use App\Talk;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talks = Talk::paginate(16);

        return view('home', ['talks' => $talks]);
    }
}
