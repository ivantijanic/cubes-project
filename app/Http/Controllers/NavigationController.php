<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class NavigationController extends Controller
{
    public function navigation(){
        
        $tags = Tag::query()
                ->where('header_menu', '1')
                ->orderBy('order_number', 'asc')
                ->get();
        dd($tags);
        
        return view('front.navigation.navigation', [
            'tags' => $tags,
        ]);
        
    }
     
    
}
