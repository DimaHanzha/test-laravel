<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Resources\BookResource;
use App\Model\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use stdClass;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $books = Book::all();

        return BookResource::collection($books);
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return BookResource|\Illuminate\Http\JsonResponse
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreBook $request
     * @param Book $book
     * @return BookResource|\Illuminate\Http\JsonResponse
     */
    public function update(Book $book, StoreBook $request)
    {
        $book = $this->bookService->updateBook($request->validated(), $book);

        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $this->bookService->deleteBook($book);

        return response()->json(new stdClass());
    }
}
