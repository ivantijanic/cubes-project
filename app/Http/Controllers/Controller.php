<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

use App\Models\Tag;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layout';

    /**
     * Show the user profile.
     */
    public function layout() {

        $tags = Tag::query()
                ->where('header_menu', '1')
                ->orderBy('order_number', 'asc')
                ->get();
        dd($tags);


     $this->layout->tags = View::make('tags');
    }

}
