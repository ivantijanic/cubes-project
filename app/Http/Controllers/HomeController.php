<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tags = Tag::query()
                ->where('header_menu', '1')
                ->orderBy('order_number', 'asc')
                ->get();
     

        return view('front.home.index', [
            'tags' => $tags,
        ]);
    }
}
