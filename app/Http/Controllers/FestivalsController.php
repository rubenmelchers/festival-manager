<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Festival;

class FestivalsController extends Controller
{
    public function index() {

        $festivals = Festival::latest()->get();

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

        Festival::create([
            'title' => request('title'),
            'description' => request('description'),
            'location' => request('location')
        ]);

        return redirect('/festivals');
    }
}
