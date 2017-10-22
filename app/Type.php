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

}
