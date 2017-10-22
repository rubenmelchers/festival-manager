<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\User;
Use App\Festival;
use App\Type;


class AdminController extends Controller
{


    //constructor
    public function __construct() {
        $this->middleware('admin');
    }

    //index method
    public function index() {

        //create variables for all users, festivals and types
        $users = User::get();
        $festivals = Festival::get();
        $types = Type::get();

        //return the view and add the variables
        return view('admin.index', compact('users', 'festivals', 'types'));
    }

    //method for handling the addUser call
    public function addUser() {
        return view('admin.addUser');
    }

    //method for handling the update call for a user from the admin panel
    public function updateUser($id) {

        //get the user
        $user = User::where('id', $id)->get();

        //parse to json
        $user->toJson();

        //return the update view with the corresponding user information
        return view('admin.updateUser', compact('user'));
    }

    //method for handling the addfestival button
    public function addFestival() {
        return view('admin.addFestival');
    }

    //method for handling a festival update request
    public function updateFestival($id) {

        //create variables for the corresponding festival. Add the user and types to it.
        $festival = Festival::where('id', $id)->get();
        $users = User::get();
        $types = Type::where('active', 1)->get();

        // the view for updating the festival and send the festival, users and types with it.
        return view('admin.updateFestival', compact('festival', 'users', 'types'));
    }

    //method for handling addding a type
    public function addType() {
        return view('admin.addType');
    }

    //method for updating a type
    public function updateType($id) {

        //create variable for corresponding type
        $type = Type::where('id', $id)->get();

        //return view for updating a type and send the corresponding type with it.
        return view('admin.updateType', compact('type'));
    }
}
