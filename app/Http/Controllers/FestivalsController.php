<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Festival;
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

        return view('festivals.create');
    }

    public function store() {

        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'location' => 'required'
        ]);


        auth()->user()->publish(

            new Festival(request(['title', 'description', 'location']))
        );

        session()->flash('message', 'You have created festival: "' . request('title') . '"');

        return redirect('/festivals');
    }

    public function update($id) {

        //get filled out form fields and handle empty fields

        if(count(request('created_by'))) {
            $name = request('name');
        }
        else {
            $name = Festival::where('id', $id)->pluck('user_id')->first();
        }

        if(count(request('title'))) {
            $title = request('title');
        } else {
            $title = Festival::where('id', $id)->pluck('title')->first();
        }

        if(count(request('description'))) {
            $description = request('description');
        } else {
            $description = Festival::where('id', $id)->pluck('description')->first();
        }

        if(count(request('location'))) {
            $location = request('location');
        } else {
            $location = Festival::where('id', $id)->pluck('location')->first();
        }

        $festival = Festival::find($id);

        $festival->user_id = $user_id
        $festival->title = $title;
        $festival->description = $description;
        $festival->location = $location;
        $festival->save();

        return redirect('admin');
    }

    public function delete($id) {

        $festival = Festival::find($id);
        $festival->delete();

        return redirect('admin');
    }
}
