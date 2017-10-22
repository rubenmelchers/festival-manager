<?php

namespace App;

Use App\Auth;
Use DB;
use Carbon\Carbon;

class Festival extends Model
{

    //method for getting the comments created on the festival
    public function comments() {

        return $this->hasMany(Comment::class);
    }

    //method for getting the user that has created this festival
    public function user() {

        return $this->belongsTo(User::class);
    }

    //method for adding a comment on a festival
    public function addComment($body, $user_id) {
        $this->comments()->create(compact([
            'body',
            'user_id'
        ]));
    }

    //method for building the filter in the sidebar
    public function scopeFilter($query, $filters) {

        //if a month has been set
        if(isset($filters['month'])) {
            if($month = $filters['month']) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
        }

        //if a year has been set
        if(isset($filters['year'])) {
            if($year = $filters['year']) {
                $query->whereYear('created_at', $year);
            }
        }

    }

    //static method for the archives
    public static function archives() {

        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    //method for getting the types belonging to this festival
    public function types() {

        return $this->belongsToMany(Type::class);
    }


    //method for adding a type to this festival
    public function addType($festival_id, $type_id) {

        DB::table('festival_type')->insert([
            'festival_id' => $festival_id,
            'type_id' => $type_id
        ]);

    }

    //method for getting the types pivot table from this festival
    public function typesPivot() {

        return $this->belongsToMany('App\Type', 'festival_type');
    }

    //method for removing a type from a festival
    public function removeType($festival_id, $type_id) {

        //create an array with the festival ID and the type ID that should be removed
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

        //query for deleting the corresponding types
        DB::table('festival_type')->where($whereArray)->delete();
    }

}
