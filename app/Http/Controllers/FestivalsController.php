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

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index() {

        $festivals = Festival::latest()
        ->filter(request(['month', 'year']))
        ->get();

        return view('festivals.index', compact('festivals'));
    }

    public function show(Festival $festival) {


        return view('festivals.show', compact('festival'));

    }

    public function create() {

        $types = Type::latest()->get();

        return view('festivals.create', compact('types'));
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'title' => 'required|unique:festivals',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
            'starttime' => 'required',
            'endtime' => 'required'
        ]);



        auth()->user()->publish(

            new Festival(request(['title', 'description', 'location', 'date', 'starttime', 'endtime']))
        );

        if($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $festival = Festival::where('title', request('title'))->first();


            $image = $request->file('image');
            $path = $image->store('public/images');

            $festival->image = Storage::url($path);
            $festival->save();
        }


        if(count($request->type)) {
            $types = $request->type;

            $festival = Festival::where('title', request('title'))->first();

            foreach($types as $type) {
                $festival->addType($festival->id, $type);
            }
        }

        session()->flash('message', 'You have created festival: "' . request('title') . '"');

        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');

        }

        return redirect('/festivals');
    }

    public function update($id, Request $request) {

        //get filled out form fields and handle empty fields
        $festival = Festival::find($id);

        if(count(request('created_by'))) {
            $user_id = request('created_by');
            $festival->user_id = $user_id;
        }

        if(count(request('title'))) {
            $title = request('title');
            $festival->title = $title;
        }

        if(count(request('description'))) {
            $description = request('description');
            $festival->description = $description;
        }

        if(count(request('location'))) {
            $location = request('location');
            $festival->location = $location;
        }

        if($request->hasFile('image')) {
            // return 'test';
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $path = $image->store('public/images');

            $festival->image = Storage::url($path);


        }

        if(count($request->type)) {

            //save the checked checkbox
            $types = $request->type;

            //remove the unchecked checkboxed from the db table where the festival id is given
            $festival->typesPivot()->detach();

            //loop through given types and add them to the pivot table
            foreach($types as $type) {

                // $festival->addType($festival->id, $type);
                $festival->typesPivot()->attach($type);
            }
        } else {
            $festival->typesPivot()->detach();
        }


        $festival->save();

        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');
        }

        return redirect('users/' . Auth::user()->id);
    }

    public function delete($id) {

        $festival = Festival::find($id);

        session()->flash('message', 'You have delete festival: "' . $festival->title . '"');

        $festival->delete();

        return redirect('admin');
    }
}
