<?php

namespace App;

use App\Traits\Product\HasInventory;
use App\Traits\Product\HasPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasInventory, HasPrice;

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
     * Scope a query to include filtered products only.
     *
     * @param \App\Filters\Filters  $filters
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);  //App\Filters\Filters.php - apply(Builder $builder);
    }

    /**
     * Scope a query to include available products only.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return  \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->whereIn('status', ['active', 'new_arrival', 'on_sale']);
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