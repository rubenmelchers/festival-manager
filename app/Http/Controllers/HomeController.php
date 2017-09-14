<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;
use App\Festival;

class HomeController extends Controller
{

    public function index() {

        $types = Type::latest()->get();
        $festivals = Festival::latest()->get();


        return view('home', compact('types', 'festivals'));
    }

}
