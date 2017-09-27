<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{


    public function create() {


        return view('registration.create');

    }

    public function store() {

        //validate form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);


        //create and save user_id
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //sign user in
        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

        session()->flash('message', 'Thank you for signing up!');


        // return view('sessions.store');
        return redirect()->home();
    }
}
