<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function post()
    {
    	return $this->hasOne('App\Post', 'id', 'post_id');
    }

    public function replies($value='')
    {
    	return $this->hasMany('App\Comment', 're_comment_id', 'id');
    }
}
