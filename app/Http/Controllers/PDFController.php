<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadOrderPDF(Order $order)
    {
        $order->load('user', 'items.product', 'transaction', 'address');

        $pdf = Pdf::loadView('pdfs.order-receipt', ['order' => $order]);
        return $pdf->download("Receipt_{$order->reference}.pdf");
    }
}
