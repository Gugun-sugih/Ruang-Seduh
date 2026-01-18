<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class PesanController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        $grouped = $menus->groupBy('category');

        return view('pages.pesan', compact('grouped'));
    }
}
