<?php

namespace App\Traits\Product;

trait HasScope
{
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
}