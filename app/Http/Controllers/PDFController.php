<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\Utilities\PDF\AppPDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Export the order in PDF format.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function pdfOrder(Order $order)
    {
        $pdfOrder = AppPDF::generate('orders.pdf._order', compact('order'));

        return $pdfOrder;
    }
}