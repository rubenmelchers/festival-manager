<?php

namespace App;


class Comment extends Model
{

    public function festival() {

        return $this->belongsTo(Festival::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }
}
