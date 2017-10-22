<?php

namespace App;


class Comment extends Model
{

    //method for getting the festival that belongs to this comment
    public function festival() {

        return $this->belongsTo(Festival::class);
    }

    //method for getting the user that has created this comment
    public function user() {

        return $this->belongsTo(User::class);
    }
}
