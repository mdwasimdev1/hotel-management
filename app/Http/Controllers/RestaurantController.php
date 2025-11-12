<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function restaurant()
{
    $restaurants = [
        (object)[
            'name' => 'Cheez - Banani',
            'category' => 'Pizza',
            'rating' => 4.9,
            'delivery_time' => '20-25',
            'delivery_fee' => 45,
            'discount' => 10,
            'image' => 'img/food1.png',
        ],
        (object)[
            'name' => 'Bella Italia - Gulshan',
            'category' => 'Pasta',
            'rating' => 4.8,
            'delivery_time' => '25-30',
            'delivery_fee' => 55,
            'discount' => null,
            'image' => 'img/food2.png',
        ],
        (object)[
            'name' => 'Shang High - Dhanmondi',
            'category' => 'Dumpling',
            'rating' => 4.6,
            'delivery_time' => '30-35',
            'delivery_fee' => 50,
            'discount' => 15,
            'image' => 'img/food1.png',
        ],
    ];
    return view('pages.restaurant', compact('restaurants'));
}
}
