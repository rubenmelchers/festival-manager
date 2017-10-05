<?php

namespace App;

class Type extends Model
{

    public function scopeActive($query) {

        return $query->where('active', 1);
    }

    public function scopeInactive($query) {
        return $query->where('active', 0);
    }

    public function festivals() {

        return $this->belongsToMany(Festival::class);
    }

    public function delete() {
        $this->festivals()->delete();
    }

    public function getRouteKeyName() {

        return 'name';
    }
}
