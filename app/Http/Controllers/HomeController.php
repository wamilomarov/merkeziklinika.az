<?php

namespace App\Http\Controllers;

use App\CarouselItem;
use App\Doctor;
use App\News;
use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel_items = CarouselItem::latest()->limit(3)->get();
        $services = Service::limit(8)->get();
        $doctors = Doctor::with('position')->inRandomOrder()->limit(6)->get();
        $news = News::latest()->limit(6)->get();

        return view('home.home')->with([
            'carousel_items' => $carousel_items,
            'services' => $services,
            'doctors' => $doctors,
            'news' => $news
        ]);
    }
}
