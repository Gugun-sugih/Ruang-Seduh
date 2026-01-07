<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index(Request $request)
    {
        $stores = [
            [
                "name" => "Ruang Seduh Dago",
                "address" => "Jl. Dago Pojok No. 21, Kecamatan Coblong, Kelurahan Dago, Kota Bandung, Jawa Barat",
                "time" => "10:00 - 22:00",
                "image" => asset("images/toko-dago.png"),
                "maps" => "https://maps.google.com/?q=Ruang+Seduh+Dago"
            ],
            [
                "name" => "Ruang Seduh Buah Batu",
                "address" => "Jl. Buah Batu Raya No. 118, Kecamatan Lengkong, Kelurahan Cikawao, Kota Bandung, Jawa Barat",
                "time" => "10:00 - 22:00",
                "image" => asset("images/toko-buahbatu.png"),
                "maps" => "https://maps.google.com/?q=Ruang+Seduh+Buah+Batu"
            ],
            [
                "name" => "Ruang Seduh Setiabudi",
                "address" => "Jl. Setiabudi Tengah No. 45, Kecamatan Sukasari, Kelurahan Sarijadi, Kota Bandung, Jawa Barat",
                "time" => "10:00 - 22:00",
                "image" => asset("images/toko-setiabudi.png"),
                "maps" => "https://maps.google.com/?q=Ruang+Seduh+Setiabudi"
            ],
            [
                "name" => "Ruang Seduh Antapani",
                "address" => "Jl. Antapani Lama No. 67, Kecamatan Antapani, Kelurahan Antapani Tengah, Kota Bandung, Jawa Barat",
                "time" => "10:00 - 22:00",
                "image" => asset("images/toko-antapani.png"),
                "maps" => "https://maps.google.com/?q=Ruang+Seduh+Antapani"
            ],
            [
                "name" => "Ruang Seduh Pasteur",
                "address" => "Jl. Dr. Djunjunan Dalam No. 9, Kecamatan Cicendo, Kelurahan Pajajaran, Kota Bandung, Jawa Barat",
                "time" => "10:00 - 22:00",
                "image" => asset("images/toko-pasteur.png"),
                "maps" => "https://maps.google.com/?q=Ruang+Seduh+Pasteur"
            ],
            [
                "name" => "Ruang Seduh Ujung Berung",
                "address" => "Jl. A.H. Nasution Barat No. 203, Kecamatan Ujung Berung, Kota Bandung, Jawa Barat",
                "time" => "10:00 - 22:00",
                "image" => asset("images/toko-ujungberung.png"),
                "maps" => "https://maps.google.com/?q=Ruang+Seduh+Ujung+Berung"
            ],
        ];

        // Search (opsional)
        $search = $request->query('search');

        if ($search) {
            $stores = array_filter($stores, function ($store) use ($search) {
                return str_contains(strtolower($store['name']), strtolower($search));
            });
        }

        return view('pages.toko', compact('stores', 'search'));
    }
}
