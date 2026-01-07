<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('pages.kontak');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:500',
        ]);

        // ✅ nanti bisa disimpan ke database / email
        // sementara simpan ke session success aja dulu

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
