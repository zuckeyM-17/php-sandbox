<?php

require_once dirname(__FILE__).'/./database.php';
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $table = 'books';
    
    protected $fillable = [
        'id',
        'isbn',
        'name',
        'author',
        'created',
        'updated',
    ];
}