<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['blog_post_id', 'visitor_name', 'body'];
	
	public function blogPost() {
		
		return $this->belongsTo(\App\Models\BlogPost::class, 'blog_post_id');
	}
}
