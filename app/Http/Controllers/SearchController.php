<?php

namespace App\Http\Controllers;

use App\Type;
use App\Festival;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function index(Request $request) {

        $keywords = $request->query;

        $festivals = Festival::Search($keywords)->get();

        if(count($festivals) < 0) {
            session()->flash('message', 'No results were found');
        }

        return view('search.show', compact('festivals'));
    }
}
