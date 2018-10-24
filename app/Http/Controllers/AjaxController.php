<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AjaxController extends Controller
{
    public function createShipping()
    {
        $view = View::make('orders.forms._shippingdetails')->render();

        if(request()->ajax()) {

            return response([
                'view' => $view,
            ]);
        }
    }
}
