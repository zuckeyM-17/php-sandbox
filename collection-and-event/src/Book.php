<?php
require_once dirname(__FILE__).'/database.php';

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model {

    use SoftDeletes;

    protected $fillable = [
        'isbn',
        'name',
        'author',
    ];
}