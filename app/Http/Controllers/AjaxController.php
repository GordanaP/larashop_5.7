<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Product;
use Illuminate\Support\Facades\View;

class AjaxController extends Controller
{
    /**
     * Create shipping address.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function createShipping()
    {
        $view = View::make('orders.forms._shippingdetails')->render();

        if(request()->ajax()) {

            return response([
                'view' => $view,
            ]);
        }
    }

    /**
     * Create an order.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function createOrder()
    {
        if (request()->ajax()) {

            $cartItems = Cart::getItems();

            $view = View::make('orders.html._items', compact('cartItems'))->render();

            return response([
                'view' => $view
            ]);
        }
    }

    /**
     * Show the product.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function showProduct(Product $product)
    {
        if(request()->ajax()) {
            return response([
                'product' => $product->load('inventories'),
            ]);
        }
    }
}
