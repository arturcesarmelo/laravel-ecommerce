<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
	
	protected $fillable = [
		'name',
		'description',
		'price',
		'slug',
		'details'
	];

    protected $appends = ['editPath', 'image_path'];

    public function presentPrice() 
    {
    	return money_format('%2n', $this->price/100); 
    }

    /**
     * Define a many-to-many relationship with App\Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Categories() 
    {
    	return $this->belongsToMany(Category::class);
    }

    /**
     * Scope a query to fetch products by category
     * beeing this category the slug or the id of the category
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string $slug_or_id
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCategory($query, $slug_or_id)
    {
    	return $query->whereHas('categories', function($q) use ($slug_or_id) {
    		$q->where('slug', 'like', "%$slug_or_id%")
    			->orWhere(\DB::raw("cast('categories.id' as varchar) = '{$slug_or_id}'"))
			;
    	});
    }

    public function getEditPathAttribute()
    {
        if ($this->attributes['slug'])
            return route('product.show', trim($this->attributes['slug']));
    }

    public function getImagePathAttribute()
    {
        return asset('/img/products/categories/laptop/macbook-pro.png');
    }
}
