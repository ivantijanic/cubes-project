<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['blog_category_id', 'author', 'photo_filename', 'title', 'description', 'body', 'published_at'];
    
    public function blogCategories (){
        return $this->belongsTo(\App\Models\BlogCategory::class, 'blog_category_id');
    }
    
    public function tags (){
        return $this->belongsToMany(\App\Models\Tag::class, 'blog_posts_tags', 'blog_post_id', 'tag_id');
    }
    
    public function comments() {
		return $this->hasMany(\App\Models\Comment::class, 'blog_post_id');
	}
    
}
