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

    //constructor for authorisation
    public function __construct() {

        //only admin can access these methods
        $this->middleware('admin', ['only' => ['update', 'delete']]);

        //guests can access all except the methods listed here
        $this->middleware('guest', ['except' => ['destroy', 'update', 'delete', 'accountPage', 'updateAccount', 'updateView', 'updateFestival']]);

        //logged in users van access these methods
        $this->middleware('auth', ['only' => ['accountPage', 'updateAccount', 'updateView', 'updateFestival']]);
    }

    //create method for user
    public function create() {

        return view('sessions.create');
    }

    //store method for saving a user in the DB
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

    //logout method
    public function destroy() {
        auth()->logout();

        return redirect()->home();
    }

    //update method for a user from the admin panel
    public function update($id, Request $request) {

        //get filled out form fields and handle empty fields
        $user = User::find($id);

        //check if there is a name given
        if(count(request('name'))) {
            $name = request('name');

            //set the name for the user
            $user->name = $name;
        }

        //check if there is an email address given
        if(count(request('email'))) {
            $email = request('email');

            //set the email for the user
            $user->email = $email;
        }

        //check if there is a password given
        if(count(request('password'))) {
            $password = request('password');

            //set the password for the user
            $user->password = bcrypt($password);
        }

        //set the user role
        $user->role = request('role');

        //save the new values for the user
        $user->save();

        //redirect to the admin panel
        return redirect('admin');
    }

    //handle the update view for the logged in user
    public function updateView($id) {

        //get logged in user ID
        $user_id = Auth::user()->id;

        //if the logged in user id does not correspond with the id from the requested accountpage, redirect to home with a flash message
        if($user_id != $id) {
            session()->flash('message', "You can't access another account's page!");

            return redirect('home');
        }

        //get the user
        $user = User::find($id);

        //return the update view with the information for the current user
        return view('sessions.update', compact('user'));
    }

    //method for updating an account with a logged in user
    public function updateAccount($id, Request $request) {

        //get logged in user ID
        $user_id = Auth::user()->id;

        //handle accountpage request with another user id
        if($user_id != $id) {
            session()->flash('message', "You can't access another account's page!");

            return redirect('home');
        }

        //get user
        $user = User::find($id);

        //check if there is an avatar given
        if($request->hasFile('avatar')) {

            //validate the image
            $this->validate($request, [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //get the image, store it in the storage and add the path to the user DB entry
            $avatar = $request->file('avatar');
            $path = $avatar->store('public/avatars');
            $user->avatar = Storage::url($path);
        }

        //check if a name has been given
        if(count(request('name'))) {
            $name = request('name');

            //set the new name for the user
            $user->name = $name;
        }

        //check if an email address has been given
        if(count(request('email'))) {
            $email = request('email');

            //set the new email address for the user
            $user->email = $email;
        }

        //check if a password has been given
        if(count(request('password'))) {

            //encrypt the password
            $password = bcrypt(request('password'));

            //set the new password
            $user->password = $password;
        }

        //save the values for the user in the DB
        $user->save();

        //create flash message
        session()->flash('message', 'You have succesfully updated your account!');

        //redirect back
        return redirect()->back();

    }

    //method for handling the festival update screen from a user
    public function updateFestival($id, $festival) {

        //get the logged in user
        $user_id = Auth::user()->id;

        //get the festival
        $festival = Festival::find($festival);

        //check if the user owns the festival
        if($user_id != $festival->user_id) {

            //if not, redirect the user back to his/her account screen with a flash message
            session()->flash('message', "You can't update festivals that are not created by you!");

            return redirect('users/' . $user_id);
        }

        //get the types
        $types = Type::get();

        //return the update view with the festival and types info
        return view('festivals.update', compact('festival', 'types'));
    }

    //method for deleting a user
    public function delete($id) {

        //get the user
        $user = User::find($id);

        //delete it from the DB
        $user->delete();

        //redirect
        return redirect('admin');
    }

    //method for handling the users account page
    public function accountPage($id) {

        //get logged in user ID
        $user_id = Auth::user()->id;

        //handle accountpage request with another user id
        if($user_id != $id) {
            session()->flash('message', "You can't access another account's page!");

            return redirect('home');
        }

        //get the user data
        $user = User::find($id);

        return view('sessions.show', compact('user'));

    }
}
