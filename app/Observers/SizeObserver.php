<?php

namespace App\Observers;

class SizeObserver
{
    /**
     * Listen to the Size creating event.
     *
     * @param  \App\Model  $model
     * @return void
     */
    public function creating($model)
    {
        $model->slug = str_slug($model->name);
    }
}