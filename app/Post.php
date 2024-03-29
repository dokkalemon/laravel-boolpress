<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'image',
    ];


    // One to Many - CATEGORIES
    public function category() {
        return $this->belongsTo('App\Category');
    }

    //Many to Many - TAGS
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
