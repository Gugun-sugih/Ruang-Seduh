<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $menus = [

            // ======================
            // KOPI PANAS
            // ======================
            [
                "name" => "Espresso",
                "price" => 18000,
                "desc" => "Sajian kopi pekat hasil ekstraksi singkat yang menonjolkan karakter asli biji kopi.",
                "image" => asset("images/espresso.png"),
                "tags" => ["Pekat", "Kuat", "Autentik"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "Americano",
                "price" => 20000,
                "desc" => "Espresso yang dipadukan dengan air panas, menghasilkan rasa lebih ringan dan beraroma.",
                "image" => asset("images/americano.png"),
                "tags" => ["Ringan", "Bersih", "Seimbang"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "Cappuccino",
                "price" => 25000,
                "desc" => "Perpaduan espresso, susu panas, dan foam susu dengan tekstur lembut dan rasa seimbang.",
                "image" => asset("images/cappucino.png"),
                "tags" => ["Lembut", "Creamy", "Klasik"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "Caffe Latte",
                "price" => 26000,
                "desc" => "Espresso dengan susu panas yang dominan, menghasilkan rasa halus dan nyaman dinikmati.",
                "image" => asset("images/latte.png"),
                "tags" => ["Halus", "Creamy", "Populer"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "Flat White",
                "price" => 27000,
                "desc" => "Kopi susu dengan tekstur lebih halus dan rasa kopi yang lebih terasa dibanding latte.",
                "image" => asset("images/flatwhite.png"),
                "tags" => ["Halus", "Seimbang", "Modern"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "Caffe Mocha",
                "price" => 28000,
                "desc" => "Perpaduan espresso, susu, dan cokelat yang menghasilkan rasa manis dengan sentuhan kopi.",
                "image" => asset("images/mocha.png"),
                "tags" => ["Manis", "Coklat", "Kaya"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "Latte Gula Aren",
                "price" => 28000,
                "desc" => "Latte dengan tambahan gula aren yang menghadirkan rasa manis alami dan aroma khas.",
                "image" => asset("images/gulaaren.png"),
                "tags" => ["Manis", "Lokal", "Hangat"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "V60",
                "price" => 30000,
                "desc" => "Kopi manual brew dengan metode pour over yang menonjolkan aroma dan karakter biji kopi.",
                "image" => asset("images/v60.png"),
                "tags" => ["Aromatik", "Jernih", "Kompleks"],
                "category" => "kopi-panas"
            ],
            [
                "name" => "French Press",
                "price" => 30000,
                "desc" => "Metode seduh manual yang menghasilkan kopi dengan body tebal dan rasa lebih bold.",
                "image" => asset("images/frenchpress.png"),
                "tags" => ["Tebal", "Kuat", "Penuh"],
                "category" => "kopi-panas"
            ],

            // ======================
            // KOPI DINGIN
            // ======================
            [
                "name" => "Es Americano",
                "price" => 22000,
                "desc" => "Espresso yang disajikan dengan air dingin dan es batu, memberikan rasa segar dan ringan.",
                "image" => asset("images/es-americano.png"),
                "tags" => ["Segar", "Ringan", "Bersih"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Es Caffe Latte",
                "price" => 27000,
                "desc" => "Perpaduan espresso, susu dingin, dan es batu dengan rasa lembut dan seimbang.",
                "image" => asset("images/es-latte.png"),
                "tags" => ["Lembut", "Creamy", "Populer"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Es Cappuccino",
                "price" => 26000,
                "desc" => "Versi dingin cappuccino dengan foam susu ringan dan rasa kopi yang seimbang.",
                "image" => asset("images/es-cappuccino.png"),
                "tags" => ["Ringan", "Creamy", "Klasik"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Es Kopi Susu",
                "price" => 23000,
                "desc" => "Espresso dengan susu dan sentuhan manis yang menjadi favorit untuk dinikmati sehari-hari.",
                "image" => asset("images/es-kopisusu.png"),
                "tags" => ["Manis", "Seimbang", "Favorit"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Es Kopi Susu Gula Aren",
                "price" => 25000,
                "desc" => "Es kopi susu dengan gula aren yang menghadirkan rasa manis alami dan aroma khas.",
                "image" => asset("images/es-gulaaren.png"),
                "tags" => ["Manis", "Lokal", "Klasik"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Cold Brew",
                "price" => 30000,
                "desc" => "Kopi yang diseduh dingin dalam waktu lama, menjadi rasa halus dan tingkat keasaman rendah.",
                "image" => asset("images/coldbrew.png"),
                "tags" => ["Halus", "Segar", "Populer"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Iced Mocha",
                "price" => 28000,
                "desc" => "Perpaduan espresso, susu dingin, cokelat, dan es dengan rasa manis yang menyegarkan.",
                "image" => asset("images/iced-mocha.png"),
                "tags" => ["Manis", "Coklat", "Kaya"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Iced Caramel Latte",
                "price" => 29000,
                "desc" => "Latte dingin dengan sirup karamel yang memberikan rasa manis dan aroma khas.",
                "image" => asset("images/iced-caramel.png"),
                "tags" => ["Manis", "Karamel", "Lembut"],
                "category" => "kopi-dingin"
            ],
            [
                "name" => "Affogato",
                "price" => 32000,
                "desc" => "Espresso panas yang dituangkan di atas es krim vanilla, menciptakan perpaduan panas dan dingin.",
                "image" => asset("images/affogato.png"),
                "tags" => ["Unik", "Kontras", "Dessert"],
                "category" => "kopi-dingin"
            ],

            // ======================
            // NON KOPI
            // ======================
            [
                "name" => "Matcha Latte",
                "price" => 27000,
                "desc" => "Perpaduan bubuk matcha dan susu yang menghasilkan rasa lembut dan aroma khas teh hijau.",
                "image" => asset("images/matcha-latte.png"),
                "tags" => ["Lembut", "Aromatik", "Populer"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Chocolate Latte",
                "price" => 26000,
                "desc" => "Minuman cokelat dengan susu yang kaya rasa dan cocok dinikmati kapan saja.",
                "image" => asset("images/chocolate-latte.png"),
                "tags" => ["Manis", "Coklat", "Creamy"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Taro",
                "price" => 26000,
                "desc" => "Minuman susu dengan rasa taro yang manis dan tekstur lembut.",
                "image" => asset("images/taro.png"),
                "tags" => ["Manis", "Lembut", "Unik"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Red Velvet",
                "price" => 27000,
                "desc" => "Minuman susu dengan cita rasa red velvet yang manis dan sedikit cokelat.",
                "image" => asset("images/red-velvet.png"),
                "tags" => ["Manis", "Creamy", "Favorit"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Green Tea",
                "price" => 18000,
                "desc" => "Teh hijau hangat atau dingin dengan rasa ringan dan menyegarkan.",
                "image" => asset("images/green-tea.png"),
                "tags" => ["Ringan", "Segar", "Alami"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Lemon Tea",
                "price" => 20000,
                "desc" => "Teh dengan perasan lemon yang memberikan rasa segar dan sedikit asam.",
                "image" => asset("images/lemon-tea.png"),
                "tags" => ["Segar", "Asam", "Ringan"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Lychee Tea",
                "price" => 22000,
                "desc" => "Minuman yang terbuat dari teh yang dicampur dengan ekstrak buah leci.",
                "image" => asset("images/lychee-tea.png"),
                "tags" => ["Manis", "Segar", "Fruity"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Milk Tea",
                "price" => 23000,
                "desc" => "Perpaduan teh dan susu dengan rasa lembut dan seimbang.",
                "image" => asset("images/milk-tea.png"),
                "tags" => ["Lembut", "Creamy", "Klasik"],
                "category" => "non-kopi"
            ],
            [
                "name" => "Mineral Water",
                "price" => 10000,
                "desc" => "Air mineral untuk menemani setiap hidangan dan menjaga kesegaran.",
                "image" => asset("images/mineral-water.png"),
                "tags" => ["Segar", "Netral", "Esensial"],
                "category" => "non-kopi"
            ],

            // ======================
            // DESSERT
            // ======================
            [
                "name" => "Cheesecake",
                "price" => 32000,
                "desc" => "Kue keju lembut dengan rasa creamy dan sedikit manis yang seimbang.",
                "image" => asset("images/cheesecake.png"),
                "tags" => ["Creamy", "Lembut", "Klasik"],
                "category" => "dessert"
            ],
            [
                "name" => "Chocolate Cake",
                "price" => 30000,
                "desc" => "Kue cokelat dengan tekstur lembut dan rasa cokelat yang kaya.",
                "image" => asset("images/chocolate-cake.png"),
                "tags" => ["Coklat", "Kaya", "Lembut"],
                "category" => "dessert"
            ],
            [
                "name" => "Brownies",
                "price" => 25000,
                "desc" => "Kue cokelat padat dengan tekstur fudgy dan rasa manis yang kuat.",
                "image" => asset("images/brownies.png"),
                "tags" => ["Fudgy", "Manis", "Favorit"],
                "category" => "dessert"
            ],
            [
                "name" => "Croissant",
                "price" => 22000,
                "desc" => "Pastry berlapis dengan tekstur renyah di luar dan lembut di dalam.",
                "image" => asset("images/croissant.png"),
                "tags" => ["Renyah", "Lembut", "Klasik"],
                "category" => "dessert"
            ],
            [
                "name" => "Donut",
                "price" => 18000,
                "desc" => "Kue manis berbentuk cincin dengan berbagai pilihan topping manis.",
                "image" => asset("images/donut.png"),
                "tags" => ["Manis", "Lembut", "Populer"],
                "category" => "dessert"
            ],
            [
                "name" => "Cookies",
                "price" => 15000,
                "desc" => "Kue kering dengan tekstur renyah di luar dan lembut di dalam.",
                "image" => asset("images/cookies.png"),
                "tags" => ["Renyah", "Manis", "Ringan"],
                "category" => "dessert"
            ],
            [
                "name" => "Tiramisu",
                "price" => 33000,
                "desc" => "Dessert khas Italia dengan lapisan krim dan sentuhan rasa kopi.",
                "image" => asset("images/tiramisu.png"),
                "tags" => ["Creamy", "Kopi", "Elegan"],
                "category" => "dessert"
            ],
            [
                "name" => "Pancake",
                "price" => 28000,
                "desc" => "Pancake lembut yang disajikan dengan sirup atau topping pilihan.",
                "image" => asset("images/pancake.png"),
                "tags" => ["Lembut", "Manis", "Hangat"],
                "category" => "dessert"
            ],
            [
                "name" => "Ice Cream",
                "price" => 20000,
                "desc" => "Es krim dengan berbagai rasa yang menyegarkan dan cocok dinikmati kapan saja.",
                "image" => asset("images/ice-cream.png"),
                "tags" => ["Dingin", "Manis", "Segar"],
                "category" => "dessert"
            ],
        ];

        // grouping by category
        $grouped = collect($menus)->groupBy('category');

        return view('pages.pesan', compact('grouped'));
    }
}
