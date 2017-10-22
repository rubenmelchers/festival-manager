<?php

namespace App;

class Type extends Model
{

    //extend a query with active types
    public function scopeActive($query) {

        return $query->where('active', 1);
    }

    //extend a query with inactive types
    public function scopeInactive($query) {
        return $query->where('active', 0);
    }

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

}
