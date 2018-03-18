<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTagGroup extends Model
{
    protected $fillable = ['title', 'description'];
	
	public function tags() {
		
		return $this->hasMany(
			\App\Models\Tag::class,
			'tags_group_id'
		);
	}
}
