<?php

namespace App;

class Type extends Model
{

    //get the festivals corresponding to this type
    public function festivals() {

        return $this->belongsToMany(Festival::class);
    }

    //delete the given type
    public function delete() {
        $this->festivals()->delete();
    }


    public function getRouteKeyName() {

        return 'name';
    }

    //method for the search function
    public function scopeSearch($query, $keywords) {
        if($keywords == '' || !$keywords) {
            return;
        }

        $query->where(function ($query) use ($keywords) {
            $query->where('name', 'LIKE', '%' . $keywords . '%')
            ->orWhere('created_at', 'LIKE',  '%' . $keywords . '%');
        });

        return $query;
    }

}
