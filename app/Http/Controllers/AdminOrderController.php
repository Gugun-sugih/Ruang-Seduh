<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

   public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $order->status = $request->status;
    $order->save();

    return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dikonfirmasi');
}

    public function show($id)
{
    $order = \App\Models\Order::with('items')->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}


}
