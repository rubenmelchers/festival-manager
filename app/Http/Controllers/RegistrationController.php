<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    //method for handling the create call
    public function create() {

        //return the registration view
        return view('registration.create');

    }

    //method for adding a user to the DB
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

        //special redirect for admins (with flash message)
        if(Auth::check() && Auth::user()->isAdmin()) {
            session()->flash('message', 'User ' . request('name') . ' was succesfully created!');

            return redirect('admin');
        }

        //sign user in
        auth()->login($user);

        //send mail to user
        \Mail::to($user)->send(new Welcome($user));

        //create flash message for user
        session()->flash('message', 'Thank you for signing up!');

        //redirect the user to home
        return redirect()->home();
    }
}
