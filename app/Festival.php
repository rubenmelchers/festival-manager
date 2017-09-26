<?php

namespace App;

Use App\Auth;

use Carbon\Carbon;

class Festival extends Model
{

    public function comments() {

        return $this->hasMany(Comment::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }


    public function addComment($body, $user_id) {
        $this->comments()->create(compact([
            'body',
            'user_id'
        ]));
    }

    public function scopeFilter($query, $filters) {

        if(isset($filters['month'])) {
            if($month = $filters['month']) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
        }

        if(isset($filters['year'])) {
            if($year = $filters['year']) {
                $query->whereYear('created_at', $year);
            }
        }

    }

}
