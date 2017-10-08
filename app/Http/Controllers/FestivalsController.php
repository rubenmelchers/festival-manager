<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Festival;
Use App\User;
Use App\Type;
use Illuminate\Support\Facades\Auth;

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
            'location' => 'required'
        ]);


        auth()->user()->publish(

            new Festival(request(['title', 'description', 'location']))
        );


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

    public function update($id) {

        //get filled out form fields and handle empty fields
        if(count(request('created_by'))) {
            $user_id = request('created_by');
        }
        else {
            $user_id = Festival::where('id', $id)->pluck('user_id')->first();
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

        $festival->user_id = $user_id;
        $festival->title = $title;
        $festival->description = $description;
        $festival->location = $location;
        $festival->save();

        return redirect('admin');
    }

    public function delete($id) {

        $festival = Festival::find($id);

        session()->flash('message', 'You have delete festival: "' . $festival->title . '"');

        $festival->delete();

        return redirect('admin');
    }
}
