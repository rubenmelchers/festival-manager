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

    public function show(Request $request) {

        $keywords = Request('query');
        $festivals = Festival::Search($keywords)->get();
        $users = User::Search($keywords)->get();
        $types = Type::Search($keywords)->get();
        $comments = Comment::Search($keywords)->get();


        if(count($festivals) <= 0 && count($users) <= 0) {
            session()->flash('message-error', 'No results were found');
        }

        return view('search.show', compact('festivals', 'users', 'types', 'comments'));
    }
}
