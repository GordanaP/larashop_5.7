<?php

namespace App\Observers;

class OrderObserver
{
    /**
     * Listen to the Order creating event.
     *
     * @param  \App\Model $model
     * @return void
     */
    public function creating($model)
    {
        $model->number =  $model->generateNumericKey();
    }
}