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

        $archives = Festival::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view('festivals.index', compact('festivals', 'archives'));
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

        return redirect('/festivals');
    }
}
