<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\User;
Use App\Festival;
use App\Type;


class AdminController extends Controller
{


    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {

        $users = User::latest()->get();
        $festivals = Festival::latest()->get();
        $types = Type::latest()->get();

        return view('admin.index', compact('users', 'festivals', 'types'));
    }

    public function updateUser($id) {

        $user = User::where('id', $id)->get();
        $user->toJson();
        return view('admin.updateUser', compact('user'));
    }

    public function addUser() {
        return view('admin.addUser');
    }

    public function addFestival() {
        return view('admin.addFestival');
    }

    public function updateFestival($id) {

        $festival = Festival::where('id', $id)->get();
        $users = Users::all()->get();

        return view('admin.updateUser', compact('festival', 'users'));
    }

    public function addType() {
        return view('admin.addType');
    }

    public function updateType($id) {

        $type = Type::where('id', $id)->get();
        
        return view('admin.updateUser', compact('type'));
    }
}
