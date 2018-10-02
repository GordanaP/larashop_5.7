<?php

namespace App\Observers;

class InventoryObserver
{
    /**
     * Listen to the Inventory creating event.
     *
     * @param  \App\Model $model
     * @return void
     */
    public function creating($model)
    {
        $model->sku =  $model->generateSku();

        $model->name =  $model->generateName();
    }
}