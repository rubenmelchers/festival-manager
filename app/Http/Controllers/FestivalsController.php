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
}
