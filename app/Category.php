<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['image_lg',
    						'image_md',
    						'image_sm',
    						'category',
							'slug',
							'parent',
							'status',
							'm_title',
							'm_keywords',
							'm_description',
						];

    public function parent_category()
    {
    	return $this->hasOne('App\Category', 'id', 'parent');
    }

    public function child_categories()
    {
        return $this->hasMany('App\Category', 'parent', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

}
