<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Festival;
use App\Type;
use Auth;
use Illuminate\Support\Facades\Storage;

class SessionController extends Controller
{

    public function __construct() {
        $this->middleware('admin', ['only' => ['update', 'delete']]);
        $this->middleware('guest', ['except' => ['destroy', 'update', 'delete', 'accountPage', 'updateAccount', 'updateView', 'updateFestival']]);
        $this->middleware('auth', ['only' => ['accountPage', 'updateAccount', 'updateView', 'updateFestival']]);
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

    public function update($id, Request $request) {

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

    public function updateAccount($id, Request $request) {

        //get logged in user ID
        $user_id = Auth::user()->id;

        //handle accountpage request with another user id
        if($user_id != $id) {
            session()->flash('message', "You can't access another account's page!");

            return redirect('home');
        }

        $user = User::find($id);

        // return $user;
        //


        if($request->hasFile('avatar')) {
            // return $request->avatar;
            $this->validate($request, [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $avatar = $request->file('avatar');
            $path = $avatar->store('public/avatars');

            $user->avatar = Storage::url($path);
        }

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

    public function updateFestival($id, $festival) {
        $user_id = Auth::user()->id;
        $festival = Festival::find($festival);

        if($user_id != $festival->user_id) {
            session()->flash('message', "You can't update festivals that are not created by you!");

            return redirect('users' . $user_id);
        }

        $types = Type::get();

        return view('festivals.update', compact('festival', 'types'));
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
