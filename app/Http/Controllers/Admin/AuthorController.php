<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthor;
use App\Model\Author;
use App\Model\Book;
use App\Services\AuthorService;

/**
 * Class AuthorController
 */
class AuthorController extends Controller
{
    /**
     * @var AuthorService
     */
    protected $authorService;

    /**
     * AuthorController constructor.
     * @param AuthorService $authorService
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $books = Book::all();

        return view('admin.authors.create', [
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAuthor $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAuthor $request)
    {
        $this->authorService->saveAuthor($request->validated());

        return redirect()->route('admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Author $author)
    {
        $books = Book::all();

        return view('admin.authors.edit', [
            'author' => $author,
            'books' => $books
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreAuthor $request
     * @param Author $author
     */
    public function update(Author $author, StoreAuthor $request)
    {
        $this->authorService->updateAuthor($request->validated(), $author);

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        $this->authorService->deleteAuthor($author);

        return redirect()->route('admin.index');
    }
}
