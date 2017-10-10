<?php

namespace App;

Use App\Auth;
Use DB;
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

    public static function archives() {

        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function types() {

        return $this->belongsToMany(Type::class);
    }

    public function addType($festival_id, $type_id) {

        DB::table('festival_type')->insert([
            'festival_id' => $festival_id,
            'type_id' => $type_id
        ]);

    }

    public function typesPivot() {

        // DB::table('festival_type')
        // return $this->belongsToMany(Type::class)->withPivot('festival_id', 'type_id');
        return $this->belongsToMany('App\Type', 'festival_type');
    }

    public function updateTypes() {

    }

    public function removeType($festival_id, $type_id) {

        $whereArray = array(
            array(
                'field' => 'festival_id',
                'operator' => '=',
                'value' => $festival_id
            ),
            array(
                'field' => 'type_id',
                'operator' => '=',
                'value' => $type_id
            )
        );

        DB::table('festival_type')->where($whereArray)->delete();
    }

}
