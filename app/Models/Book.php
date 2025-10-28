<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    //
    protected $fillable=[
        'title',
        'author_id',
        'published_year',
        'genre'
    ];
protected $casts = [ 
    'published_year' =>'integer',

];

public function Author (): BelongsTo
{
    return $this->belongsTo(Author::class);
}
}
