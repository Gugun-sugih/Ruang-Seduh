<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;

class CartController extends Controller
{
    // ✅ tampilkan halaman keranjang (checkoutPage)
    public function checkoutPage()
    {
        $cart = Session::get('cart', []);
        return view('pages.keranjang', compact('cart'));
    }

    // ✅ add menu ke cart (PAKAI menu_id dari DB)
    public function add(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|integer|exists:menus,id',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        $cart = Session::get('cart', []);
        $key = (string) $menu->id;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += 1;
        } else {
            $cart[$key] = [
                "id"    => $menu->id,
                "name"  => $menu->name,
                "price" => (int) $menu->price,
                "image" => $menu->image ? asset('storage/' . $menu->image) : asset('images/no-image.png'),
                "qty"   => 1,
                "note"  => null,
            ];
        }

        Session::put('cart', $cart);

        return back()->with('success', 'Menu ditambahkan ke keranjang!');
    }

    // ✅ tambah qty (pakai menu_id)
    public function increase(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|integer',
        ]);

        $cart = Session::get('cart', []);
        $key = (string) $request->menu_id;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += 1;
        }

        Session::put('cart', $cart);
        return back();
    }

    // ✅ kurang qty (pakai menu_id)
    public function decrease(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|integer',
        ]);

        $cart = Session::get('cart', []);
        $key = (string) $request->menu_id;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] -= 1;

            if ($cart[$key]['qty'] <= 0) {
                unset($cart[$key]);
            }
        }

        Session::put('cart', $cart);
        return back();
    }

    // ✅ hapus 1 item dari cart (pakai menu_id)
    public function remove(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|integer',
        ]);

        $cart = Session::get('cart', []);
        $key = (string) $request->menu_id;

        if (isset($cart[$key])) {
            unset($cart[$key]);
        }

        Session::put('cart', $cart);
        return back()->with('success', 'Item dihapus dari keranjang!');
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
            return redirect('/pesan')->with('error', 'Keranjang kosong!');
        }

        return view('pages.pembayaran', compact('cart'));
    }

    // ✅ proses bayar → simpan ke database + redirect struk
    public function pay(Request $request)
    {
        $cart = Session::get('cart', []);

        if (count($cart) == 0) {
            return redirect('/pesan')->with('error', 'Keranjang kosong!');
        }

        $request->validate([
            'customer_name'   => 'required|string|max:100',
            'table_number'    => 'nullable|string|max:20',
            'payment_method'  => 'required|string|max:50',
        ]);

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
                "note" => $item['note'] ?? null
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

    // ✅ simpan catatan per item (pakai menu_id)
    public function updateNote(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|integer',
            'note' => 'nullable|string|max:255',
        ]);

        $cart = Session::get('cart', []);
        $key = (string) $request->menu_id;

        if (isset($cart[$key])) {
            $cart[$key]['note'] = $request->note;
        }

        Session::put('cart', $cart);

        return redirect()->back();
    }
}
