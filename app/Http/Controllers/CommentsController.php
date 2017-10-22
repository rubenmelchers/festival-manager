<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Comment;

class CommentsController extends Controller
{


    public function store(Festival $festival) {

        $this->validate(request(), [
            'body' => 'required'
        ]);

        //call the addcomment on the corresponding festival
        $festival->addComment(request('body'), \Auth::user()->id);

        return back();

    }
}
