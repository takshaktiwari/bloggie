<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function categories()
    {
    	return $this->belongsToMany('App\Category');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment', 'post_id', 'id')
    				->whereNotNull('re_comment_id');
    }

}
