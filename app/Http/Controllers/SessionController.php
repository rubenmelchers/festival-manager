<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct() {
        $this->middleware('admin', ['only' => ['update', 'delete']]);
        $this->middleware('guest', ['except' => ['destroy', 'update', 'delete']]);

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

    public function update($id) {

        //get filled out form fields and handle empty fields

        if(count(request('name'))) {
            $name = request('name');
        }
        else {
            $name = User::where('id', $id)->pluck('name')->first();
        }

        if(count(request('email'))) {
            $email = request('email');
        } else {
            $email = User::where('id', $id)->pluck('email')->first();
        }

        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->role = request('role');
        $user->save();

        return redirect('admin');
    }

    public function delete($id) {

        $user = User::find($id);
        $user->delete();

        return redirect('admin');
    }
}
