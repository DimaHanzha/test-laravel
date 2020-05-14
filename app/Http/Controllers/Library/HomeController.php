<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Model\Author;

/**
 * Class HomeController
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authors = Author::all();

        return view('home', [
            'authors' => $authors
        ]);
    }
}
