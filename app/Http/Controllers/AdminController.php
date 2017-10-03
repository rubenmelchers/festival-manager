<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\User;
Use App\Festival;


class AdminController extends Controller
{


    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {

        $users = User::latest()->get();


        return view('admin.index', compact('users'));
    }
}
