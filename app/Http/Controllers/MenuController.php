<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');

        $query = Menu::query()->latest();

        if ($category) {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $menus = $query->get();

        return view('pages.menu', compact('menus', 'search', 'category'));
    }
}
