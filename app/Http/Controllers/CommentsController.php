<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Comment;

class CommentsController extends Controller
{


    public function store(Festival $festival) {

        $this->validate(request(), ['body', 'required|min:2']);

        $festival->addComment(request('body'));

        return back();

    }
}
