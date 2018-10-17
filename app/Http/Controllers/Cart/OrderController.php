<?php

namespace App\Http\Controllers\Cart;

use App\Events\OrderHasBeenPlaced;
use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Services\Utilities\PDF\AppPDF;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->ajax()) {

            $cartItems = Cart::getItems();

            $view = View::make('orders.html._items', compact('cartItems'))->render();

            return response([ 'view' => $view ]);
        }

        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = Order::placeNew($request);

        $invoice = AppPDF::generate('orders.pdf._invoice', compact('order'));

        event(new OrderHasBeenPlaced($order, $invoice));

        return redirect()->route('orders.show', $order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}