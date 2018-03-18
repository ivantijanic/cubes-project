<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model {

    protected $fillable = ['title'];

    public function blogPosts() {
        return $this->hasMany(\App\Models\BlogPost::class, 'blog_category_id');
    }

}
