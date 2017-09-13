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
}
