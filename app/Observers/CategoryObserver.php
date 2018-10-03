<?php

namespace App\Observers;

class CategoryObserver
{
    /**
     * Listen to the Category creating event.
     *
     * @param  \App\Model  $model
     * @return void
     */
    public function creating($model)
    {
        $model->slug = str_slug($model->name);
    }
}