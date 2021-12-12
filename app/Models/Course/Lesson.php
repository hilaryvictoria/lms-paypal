<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Course\Category');
    }

    public function course() {
        return $this->belongsTo('App\Models\Course\Course');
    }

    public function medias() {
        return $this->hasMany('App\Models\Course\Media');
    }
}
