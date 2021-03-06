<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Category::with(['products' => function($query) {
            $query->inRandomOrder()->limit(8);
        }])->get();

        $banners = Banner::latest()->get();

        // return $banners;

        return view('landingPage', compact('categories', 'banners'));
    }
}
