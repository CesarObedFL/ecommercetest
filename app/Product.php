<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Product extends Model implements HasMedia
{
	use HasMediaTrait;

	protected $fillable = [
		'name', 'slug', 'description', 'price', 'status',
	];


	public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('product-image')->width(450)->height(450);
    }

}
