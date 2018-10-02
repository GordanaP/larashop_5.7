<?php

namespace App\Observers;

class ProductObserver
{
    /**
     * Listen to the Product creating event.
     *
     * @param  \App\Model  $model
     * @return void
     */
    public function creating($model)
    {
        $model->slug = str_slug($model->name);
    }
}