<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct() {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create() {

        return view('sessions.create');

    }

    public function store() {

        //attempt to auth User

        if (! auth()->attempt(request(['email', 'password']))) {

            //if not, redirect back
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }


        //if so, sign them in


        //redirect to home page
        return redirect()->home();
    }

    public function destroy() {
        auth()->logout();

        return redirect()->home();
    }
}
