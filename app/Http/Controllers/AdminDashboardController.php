<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();

        // total pendapatan dari pesanan yang PAID (atau confirmed sesuai sistemmu)
        // di tabelmu status bisa 'pending', 'confirmed', 'paid' -> sesuaikan di sini
        $totalRevenue = Order::whereIn('status', ['paid', 'PAID', 'confirmed'])->sum('total');

        $totalMenus = Menu::count();

        // aktivitas sederhana (ambil 5 terakhir)
        $latestOrders = Order::latest()->take(3)->get();
        $latestMenus  = Menu::latest()->take(2)->get();

        $activities = [];

        foreach ($latestOrders as $o) {
            $activities[] = "Pesanan baru: #{$o->id} - {$o->customer_name} (" . strtoupper($o->status) . ")";
        }

        foreach ($latestMenus as $m) {
            $activities[] = "Menu ditambahkan: {$m->name}";
        }

        return view('admin.dashboard', compact('totalOrders', 'totalRevenue', 'totalMenus', 'activities'));
    }
}
