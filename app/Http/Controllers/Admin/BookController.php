<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Model\Author;
use App\Model\Book;

/**
 * Class BookController
 */
class BookController extends Controller
{
    /**
     * @var \App\Services\BookService
     */
    protected $bookService;

    /**
     * BookController constructor.
     *
     * @param \App\Services\BookService $bookService
     */
    public function __construct(\App\Services\BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $authors = Author::all();

        return view('admin.books.create', [
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBook $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBook $request)
    {
        $this->bookService->saveBook($request->validated());

        return redirect()->route('admin.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('admin.books.edit', [
            'book' => $book,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreBook $request
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreBook $request, Book $book)
    {
        $this->bookService->updateBook($request->validated(), $book);

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $this->bookService->deleteBook($book);

        return redirect()->route('admin.index');
    }
}
