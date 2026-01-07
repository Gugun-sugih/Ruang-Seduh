<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    // ✅ tampilkan halaman keranjang (checkoutPage)
    public function checkoutPage()
    {
        $cart = Session::get('cart', []);
        return view('pages.keranjang', compact('cart'));
    }

    // ✅ add menu ke cart
    public function add(Request $request)
    {
        $cart = Session::get('cart', []);

        $name = $request->name;

        if (isset($cart[$name])) {
            $cart[$name]['qty'] += 1;
        } else {
            $cart[$name] = [
                "name" => $request->name,
                "price" => $request->price,
                "image" => $request->image,
                "qty" => 1,
            ];
        }

        Session::put('cart', $cart);

        return back()->with('success', 'Menu ditambahkan ke keranjang!');
    }

    // ✅ tambah qty
    public function increase(Request $request)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$request->name])) {
            $cart[$request->name]['qty'] += 1;
        }

        Session::put('cart', $cart);
        return back();
    }

    // ✅ kurang qty
    public function decrease(Request $request)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$request->name])) {
            $cart[$request->name]['qty'] -= 1;

            if ($cart[$request->name]['qty'] <= 0) {
                unset($cart[$request->name]);
            }
        }

        Session::put('cart', $cart);
        return back();
    }

    // ✅ hapus semua cart
    public function clear()
    {
        Session::forget('cart');
        return back()->with('success', 'Keranjang dikosongkan!');
    }

    // ✅ submit checkout → tampilkan pembayaran
    public function checkout(Request $request)
    {
        $cart = Session::get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('pesan')->with('error', 'Keranjang kosong!');
        }

        return view('pages.pembayaran', compact('cart'));
    }

    // ✅ proses bayar → simpan ke database + redirect struk
    public function pay(Request $request)
    {
        $cart = Session::get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('pesan')->with('error', 'Keranjang kosong!');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        $tax = $subtotal * 0.10;
        $service = $subtotal * 0.05;
        $total = $subtotal + $tax + $service;

        // ✅ simpan order
        $order = Order::create([
            "customer_name" => $request->customer_name,
            "table_number" => $request->table_number,
            "order_date" => now(),
            "payment_method" => $request->payment_method,
            "subtotal" => $subtotal,
            "tax" => $tax,
            "service" => $service,
            "total" => $total,
            "status" => "pending"
        ]);

        // ✅ simpan order item
        foreach ($cart as $item) {
            OrderItem::create([
                "order_id" => $order->id,
                "name" => $item['name'],
                "price" => $item['price'],
                "qty" => $item['qty'],
                "total" => $item['price'] * $item['qty'],
                "note" => null
            ]);
        }

        Session::forget('cart');

        return redirect()->route('checkout.struk', $order->id);
    }

    // ✅ struk
    public function struk($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('pages.struk', compact('order'));
    }

    public function updateNote(Request $request)
{
    $cart = session()->get('cart', []);

    $name = $request->name;
    $note = $request->note;

    if(isset($cart[$name])){
        $cart[$name]['note'] = $note;
    }

    session()->put('cart', $cart);

    return redirect()->back();
}

}
