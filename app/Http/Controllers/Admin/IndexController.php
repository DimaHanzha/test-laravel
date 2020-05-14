<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Author;
use App\Model\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $authors = Author::all();

        $books = Book::whereHas('authors', function ($query) use ($authors) {
            $query->whereIn('id', $authors->pluck('id')->toArray());
        })->get();

        return view('admin.index', [
            'books' => $books,
            'authors' => $authors
        ]);
    }
}
