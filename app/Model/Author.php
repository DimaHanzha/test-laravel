<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 */
class Author extends Model
{
    protected $fillable = ['first_name', 'last_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    /**
     * Get Author Full Name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
