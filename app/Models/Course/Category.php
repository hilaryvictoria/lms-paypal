<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function course() {
        return $this->belongsTo('App\Models\Course\Course');
    }

    public function lessons() {
        return $this->hasMany('App\Models\Course\Lesson');
    }
}
