<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Festival;
Use App\User;
Use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


// use Carbon\Carbon;

class FestivalsController extends Controller
{

    //constructor for handling authorisations.
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }


    //index method
    public function index() {

        $festivals = Festival::latest()
        ->filter(request(['month', 'year']))
        ->get();

        return view('festivals.index', compact('festivals'));
    }

    //show method for a single festival
    public function show(Festival $festival) {


        return view('festivals.show', compact('festival'));

    }

    //create method for a festival
    public function create() {

        //create variable for the types
        $types = Type::where('active', 1)->get();

        $commentCount = Auth::user()->comments()->get();

        if(count($commentCount) <= 4 && Auth::user()->isAdmin() != true) {
            session()->flash('message-error', 'You need to create at least 4 comments before you can create a festival!');
            return redirect('home');
        }

        //return the create view and send the types with it
        return view('festivals.create', compact('types'));
    }

    //store method for saving a festival
    public function store(Request $request) {

        //validate the input fields
        $this->validate(request(), [
            'title' => 'required|unique:festivals',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
            'starttime' => 'required',
            'endtime' => 'required'
        ]);


        //call the publish method on the current logged in user
        auth()->user()->publish(

            new Festival(request(['title', 'description', 'location', 'date', 'starttime', 'endtime']))
        );

        //check if there is a file
        if($request->hasFile('image')) {

            //validate the file
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //get the created festival
            $festival = Festival::where('title', request('title'))->first();

            //create variable for the image
            $image = $request->file('image');
            //save the image in the storage and add the path to the festival table entry
            $path = $image->store('public/images');
            $festival->image = Storage::url($path);
            $festival->save();
        }


        //check if there are any types
        if(count($request->type)) {
            $types = $request->type;

            $festival = Festival::where('title', request('title'))->first();

            //add each found types to the festival
            foreach($types as $type) {
                $festival->addType($festival->id, $type);
            }
        }

        //send a flash message to the screen.
        session()->flash('message', 'You have created festival: "' . request('title') . '"');

        //special redirect for when an admin is logged in
        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');

        }

        //redirect to the festivals screen
        return redirect('/festivals');
    }

    //update method for a festival
    public function update($id, Request $request) {

        //get filled out form fields and handle empty fields
        $festival = Festival::find($id);

        //check if the input field for the festival creator is set
        if(count(request('created_by'))) {
            $user_id = request('created_by');
            $festival->user_id = $user_id;
        }

        //check if the input field for the festival title is set
        if(count(request('title'))) {
            $title = request('title');
            $festival->title = $title;
        }

        //check if the input field for the festival description is set
        if(count(request('description'))) {
            $description = request('description');
            $festival->description = $description;
        }

        //check if the input field for the festival location is set
        if(count(request('location'))) {
            $location = request('location');
            $festival->location = $location;
        }

        //check if the festival image is set
        if($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $path = $image->store('public/images');

            $festival->image = Storage::url($path);


        }

        //check which types checkboxes are set
        if(count($request->type)) {

            //save the checked checkbox
            $types = $request->type;

            //remove the unchecked checkboxed from the db table where the festival id is given
            $festival->typesPivot()->detach();

            //loop through given types and add them to the pivot table
            foreach($types as $type) {

                $festival->typesPivot()->attach($type);
            }
        } else {
            $festival->typesPivot()->detach();
        }

        //save the festival
        $festival->save();

        //special redirect for admins
        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');
        }

        //redirect users to their page
        return redirect('users/' . Auth::user()->id);
    }

    //method for deleting a festival
    public function delete($id) {

        $festival = Festival::find($id);

        session()->flash('message', 'You have delete festival: "' . $festival->title . '"');

        $festival->delete();

        return redirect('admin');
    }
}
