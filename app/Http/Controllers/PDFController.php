<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function pdfOrder(Order $order)
    {

        $pdf = PDF::loadView('orders.html._pdf', compact('order'));

        return $pdf->stream('order.pdf');
    }
}
