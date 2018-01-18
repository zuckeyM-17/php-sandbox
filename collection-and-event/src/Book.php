<?php
require_once dirname(__FILE__).'/database.php';

use Illuminate\Database\Eloquent\Model;
class Book extends Model {
    protected $fillable = [
        'isbn',
        'name',
        'author',
    ];
}