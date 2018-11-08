<?php

namespace App;

use App\Traits\Product\HasInventory;
use App\Traits\Product\HasPrice;
use App\Traits\Product\HasScope;
use App\Traits\Product\Reviewable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasInventory, HasPrice, Reviewable, HasScope;

    /**
     * The attributes that should have default values
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'inactive',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the inventories that belong to the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Get the categories that have many products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the reviews that belong to the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the product's image.
     *
     * @param  string $image
     * @param  \App\Product
     * @param  string $disk
     * @return Illuminate\Http\UploadedFile
     */
    public function getImage($image, $product, $disk='public')
    {
        $image = Storage::disk($disk)->has($image) ? route('products.show.image', $product) : asset('images/products/default.jpg');

        return $image;
    }
}