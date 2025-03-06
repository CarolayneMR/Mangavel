<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Book extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [ 
        'title',
        'author',
        'genres',
        'pages',
        'user_id'
    ];
}
