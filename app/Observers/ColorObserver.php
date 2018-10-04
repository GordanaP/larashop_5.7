<?php

namespace App\Observers;

class ColorObserver
{
    /**
     * Listen to the Color creating event.
     *
     * @param  \App\Model  $model
     * @return void
     */
    public function creating($model)
    {
        $model->slug = str_slug($model->name);
    }
}