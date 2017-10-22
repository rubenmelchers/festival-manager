<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;
use Illuminate\Support\Facades\Auth;


class TypesController extends Controller
{

    //method for the index
    public function index(Type $type) {

        //get festivals with sent type
        $festivals = $type->festivals;

        return view('festivals.index', compact('festivals'));

    }

    //method for handling the type detailpage
    public function show(Type $type) {


        return view('types.show', compact('type'));

    }

    //method for handling the type creation page
    public function create() {

        return view('types.create');
    }

    //method for storing the newly added type in the DB
    public function store() {

        //validate the input fields
        $this->validate(request(), [
            'name' => 'required',
            'active' => 'required'
        ]);

        //create the type
        Type::create([
            'name' => request('name'),
            'active' => (int) request('active')
        ]);

        //create flash message for user feedback
        session()->flash('message', 'You have created festival: "' . request('name') . '"');

        //special redirect for admin
        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');

        }

        //redirect back to types page
        return redirect('/types');
    }

    //method for updating a type
    public function update($id) {

        //get the type
        $type = Type::find($id);

        //check if a type name is set
        if(count(request('name'))) {
            $name = request('name');

            //set the new value for the type name
            $type->name = $name;
        }

        //check if the active state is set
        if(count(request('active'))) {
            $active = (int) request('active');

            //set the active value for the type
            $type->active = $active;
        }

        //save the values
        $type->save();

        //redirect back to the adminpanel
        return redirect('admin');
    }

    //method for deleting a type
    public function delete($id) {

        //get the type
        $type = Type::find($id);

        //set flash message with the type name before deleting
        session()->flash('message', 'You have deleted type: "' . $type->name . '"');

        //delete the type
        $type->delete();

        //redirect back to the adminpanel
        return redirect('admin');
    }

}
