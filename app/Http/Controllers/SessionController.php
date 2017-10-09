<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct() {
        $this->middleware('admin', ['only' => ['update', 'delete']]);
        $this->middleware('guest', ['except' => ['destroy', 'update', 'delete', 'accountPage', 'updateAccount', 'updateView']]);
        $this->middleware('auth', ['only' => ['accountPage', 'updateAccount', 'updateView']]);
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

        //redirect to home page
        return redirect()->home();
    }

    public function destroy() {
        auth()->logout();

        return redirect()->home();
    }

    public function update($id) {

        //get filled out form fields and handle empty fields
        $user = User::find($id);

        if(count(request('name'))) {
            $name = request('name');
            $user->name = $name;
        }

        if(count(request('email'))) {
            $email = request('email');
            $user->email = $email;
        }

        if(count(request('password'))) {
            $password = request('password');
            $user->password = $password;
        }


        $user->role = request('role');
        $user->save();

        return redirect('admin');
    }

    public function updateView($id) {
        //get logged in user ID
        $user_id = Auth::user()->id;

        //handle accountpage request with another user id
        if($user_id != $id) {
            session()->flash('message', "You can't access another account's page!");

            return redirect('home');
        }

        $user = User::find($id);

        return view('sessions.update', compact('user'));
    }

    public function updateAccount($id) {

        //get logged in user ID
        $user_id = Auth::user()->id;

        //handle accountpage request with another user id
        if($user_id != $id) {
            session()->flash('message', "You can't access another account's page!");

            return redirect('home');
        }

        $user = User::find($id);

        if(count(request('name'))) {
            $name = request('name');
            $user->name = $name;
        }


        if(count(request('email'))) {
            $email = request('email');
            $user->email = $email;
        }

        if(count(request('password'))) {
            $password = bcrypt(request('password'));
            $user->password = $password;
        }


        $user->save();

        session()->flash('message', 'You have succesfully updated your account!');
        return redirect()->back();

    }

    public function delete($id) {

        $user = User::find($id);
        $user->delete();

        return redirect('admin');
    }

    public function accountPage($id) {

        //get logged in user ID
        $user_id = Auth::user()->id;

        //handle accountpage request with another user id
        if($user_id != $id) {
            session()->flash('message', "You can't access another account's page!");

            return redirect('home');
        }

        $user = User::find($id);

        return view('sessions.show', compact('user'));

    }
}
