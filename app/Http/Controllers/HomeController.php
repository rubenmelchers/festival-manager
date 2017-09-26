<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;
use App\Festival;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function welcome() {

        $types = Type::latest()->get();
        $festivals = Festival::latest()->get();


        return view('welcome', compact('types', 'festivals'));
    }
}
