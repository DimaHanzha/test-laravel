<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 */
class Book extends Model
{
    protected $fillable = ['title', 'isbn'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
