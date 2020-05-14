<?php

namespace App\Services;

use App\Model\Book;

/**
 * Class BookService
 */
class BookService
{
    /**
     * @var \App\Model\Book
     */
    protected $model;

    /**
     * BookService constructor.
     *
     * @param \App\Model\Book $bookModel
     */
    public function __construct(\App\Model\Book $bookModel)
    {
        $this->model = $bookModel;
    }

    /**
     * Save New Book.
     *
     * @param array $fields
     * @return Book
     */
    public function saveBook(array $fields)
    {
        $book = $this->model::create($fields);

        if (!empty($fields['authors'])) {
            $book->authors()->sync($fields['authors']);
        }

        return $this->model;
    }

    /**
     * Update Book.
     *
     * @param array $fields
     * @param Book $book
     * @return Book
     */
    public function updateBook(array $fields, Book $book)
    {
        $book->update($fields);

        if (!empty($fields['authors'])) {
            $book->authors()->sync($fields['authors']);
        }
        return $book;
    }

    /**
     * Delete Book.
     *
     * @param Book $book
     * @return bool|null
     * @throws \Exception
     */
    public function deleteBook(Book $book)
    {
        return $book->delete();
    }
}
