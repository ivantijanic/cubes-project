<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
	
	protected $fillable = ['product_group_id', 'title', 'description',
            'order_number', 'fa_icon', 'header_manu',
            ];
	
	
	public function productGroup() {
		return $this->belongsTo(\App\Models\ProductGroup::class, 'product_group_id');
	}
        
        public function productSubcatregory() {
		return $this->hasMany(\App\Models\ProductSubcategory::class, 'product_category_id');
	}
	
	public function products() {
		return $this->hasMany(\App\Models\Product::class, 'product_category_id');
	}
}
