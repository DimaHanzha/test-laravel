<?php

namespace App\Services;

use App\Model\Author;

/**
 * Class AuthorService
 */
class AuthorService
{
    /**
     * @var \App\Model\Author
     */
    protected $model;

    /**
     * AuthorService constructor.
     *
     * @param \App\Model\Author $authorModel
     */
    public function __construct(\App\Model\Author $authorModel)
    {
        $this->model = $authorModel;
    }

    /**
     * Save Author.
     *
     * @param array $fields
     * @return \App\Model\Author
     */
    public function saveAuthor(array $fields)
    {
        $author = $this->model::create($fields);

        if (!empty($fields['books'])) {
            $author->books()->sync($fields['books']);
        }

        return $this->model;
    }

    /**
     * Update Author.
     *
     * @param array $fields
     * @param Author $author
     * @return Author
     */
    public function updateAuthor(array $fields, Author $author)
    {
        $author->update($fields);

        if (!empty($fields['books'])) {
            $author->books()->sync($fields['books']);
        }
        return $author;
    }

    /**
     * Delete Author.
     *
     * @param Author $author
     * @return bool|null
     * @throws \Exception
     */
    public function deleteAuthor(Author $author)
    {
        return $author->delete();
    }
}
