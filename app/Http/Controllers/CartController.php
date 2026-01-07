<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // ✅ ADD ITEM
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $name = $request->name;

        if (isset($cart[$name])) {
            $cart[$name]['qty']++;
        } else {
            $cart[$name] = [
                "name" => $request->name,
                "price" => (int)$request->price,
                "image" => $request->image,
                "qty" => 1,
                "note" => ""
            ];
        }

        session()->put('cart', $cart);

        return back();
    }

    // ✅ INCREASE
    public function increase(Request $request)
    {
        $cart = session()->get('cart', []);
        $name = $request->name;

        if (isset($cart[$name])) {
            $cart[$name]['qty']++;
        }

        session()->put('cart', $cart);
        return back();
    }

    // ✅ DECREASE
    public function decrease(Request $request)
    {
        $cart = session()->get('cart', []);
        $name = $request->name;

        if (isset($cart[$name])) {
            $cart[$name]['qty']--;

            if ($cart[$name]['qty'] <= 0) {
                unset($cart[$name]);
            }
        }

        session()->put('cart', $cart);
        return back();
    }

    // ✅ REMOVE ITEM
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->name]);

        session()->put('cart', $cart);
        return back();
    }

    // ✅ CLEAR ALL
    public function clear()
    {
        session()->forget('cart');
        return back();
    }

    // ✅ CHECKOUT PAGE
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('pages.checkout', compact('cart'));
    }

    // ✅ PAY -> SIMULASI OUTPUT STRUK
    public function pay(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('checkout')->with('error', 'Keranjang kosong!');
        }

        // hitung subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        $tax = $subtotal * 0.10;
        $service = $subtotal * 0.05;
        $total = $subtotal + $tax + $service;

        // data pembayaran (bisa dipakai struk)
        $orderData = [
            "customer_name" => $request->customer_name,
            "table_number"  => $request->table_number,
            "payment_method"=> $request->payment_method,
            "subtotal"      => $subtotal,
            "tax"           => $tax,
            "service"       => $service,
            "total"         => $total,
            "cart"          => $cart
        ];

        session()->put('order', $orderData);

        // kosongkan cart setelah bayar
        session()->forget('cart');

        return redirect()->route('checkout.struk');
    }

    // ✅ STRUK
    public function struk()
    {
        $order = session()->get('order');

        if (!$order) {
            return redirect('/pesan');
        }

        return view('pages.struk', compact('order'));
    }
}
